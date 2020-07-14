<?php
namespace frontend\controllers;

use backend\models\Notices;
use backend\models\Pets;
use common\models\UpdatePassword;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Pets::find()->where(['deleted_at' => 0])->limit(3)->all();
        $model1 = Pets::find()->where(['deleted_at' => 0])->orderBy(['sales' => SORT_DESC])->limit(8)->all();
        $model2 = Pets::find()->where(['deleted_at' => 0])->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        $model3 = Notices::find()->where(['deleted_at' => 0])->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $model4 = Pets::find()->where(['deleted_at' => 0])->limit(10)->all();

        return $this->render('index',[
                'model' => $model,
                'model1' => $model1,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
            ]
        );
    }
    /**
     * 登录
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->getSession()->setFlash('success','登录成功');
            return $this->goBack();
        } else {
            $model->password = '';
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);

            return $this->render('/index/login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * 修改密码
     * @return string|\yii\web\Response
     */
    public function actionUpdatePassword()
    {

        $model = new UpdatePassword();
        if ($model->load(Yii::$app->request->post()) && $model->update())
        {
            Yii::$app->getSession()->setFlash('success', '修改密码成功，已为你自动登录');
            return $this->goBack();
        }
        return $this->render('/index/updatePassword', [
            'model' => $model,
        ]);
    }


    /**
     * 退出登录
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->setFlash('success','退出登录成功');
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        return $this->goBack();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * 注册
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', '谢谢注册。 请检查您的收件箱中的验证电子邮件，并进行验证激活,再进行登录。');

            return $this->redirect(['index/index']);
        }

        return $this->render('../index/signup', [
            'model' => $model,
        ]);
    }

    /**
     * 重置密码
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', '查看您的电子邮件进行验证');

                return $this->redirect(['index/index']);

            } else {
                Yii::$app->session->setFlash('error', '抱歉，我们无法为提供的电子邮件地址重置密码。');
            }
        }

        return $this->render('../index/requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * 填写重置密码
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', '密码已重置，新密码已保存。');

            return $this->redirect(['index/index']);
        }

        return $this->render('../index/resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * 注册验证邮箱
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', '你的邮箱已确认，账号已经激活。');
                return $this->redirect(['index/index']);

            }
        }

        Yii::$app->session->setFlash('error', '抱歉，我们无法使用提供的令牌验证您的帐户。');
        return $this->redirect(['index/index']);

    }

    /**
     * 改新邮箱
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', '查看您的电子邮件进行验证。');
                return $this->redirect(['index/index']);
            }
            Yii::$app->session->setFlash('error', '抱歉，我们无法为提供的电子邮件地址重新发送验证电子邮件。');
        }

        return $this->render('../index/resendVerificationEmail', [
            'model' => $model
        ]);
    }


}
