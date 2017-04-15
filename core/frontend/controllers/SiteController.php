<?php
namespace frontend\controllers;

use common\models\Mailbox;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
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
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionViTri() {
        return $this->render('vitri');
    }

    public function actionMatBang() {
        return $this->render('matbang');
    }

    public function actionTienIch() {
        return $this->render('tienich');
    }

    public function actionCanHoMau() {
        return $this->render('canhomau');
    }

    public function actionCanHoMau2PhongNgu() {
        return $this->render('canhomau2phongngu');
    }

    public function actionCanHoMau3PhongNgu() {
        return $this->render('canhomau3phongngu');
    }

    public function actionTienDo() {
        return $this->render('tiendo');
    }

    public function actionThanhToanUuDai() {
        return $this->render('thanhtoanuudai');
    }

    public function actionMail() {
        $model = new Mailbox();
        $model->load(Yii::$app->request->post());
//        if(!empty($model->secret_key)) {
//            $project = Project::find()->where(['secret_key' => $model->secret_key])->select([
//                'id',
//                'title',
//                'website',
//                'contact_name',
//                'contact_email'
//            ])->one();
//            $model->project_id = $project->id;
//            $to_email = $project->contact_email;
//            $to_name = $project->contact_email;
//        }
        $projectName = 'DuAnTheGoldView';
        $projectWebsite = 'DuAnTheGoldView.net';
//        if(isset($project->title)) {
//            $projectName = $project->title;
//        }
//        if(isset($project->website)) {
//            $projectWebsite = $project->website;
//        }
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->charset = 'UTF-8';
        if($model->validate()) {
            $body = '<p>Liên hệ từ dự án ' . $projectName . ' (website: ' . $projectWebsite . ') với nội dung:</p>' .
                '<p><strong>Họ và tên:</strong> ' . $model->name . '</p>' .
                '<p><strong>Số điện thoại:</strong> ' . $model->phone . '</p>' .
                '<p><strong>Email:</strong> ' . $model->email . '</p>';
            if(!empty($model->content)) {
                $body .= '<p><strong>Nội dung:</strong> ' . $model->content . '</p>';
            }
            try {
                $message = Yii::$app->mailer->compose();

//                    if(!empty($model->to_email)) {
//                        $message->setTo([$to_email => $to_name]);
//                        $message->setCc(['nguyentuansieu@gmail.com' => 'Siêu™']);
//                    } else {
                $message->setTo(['khuongan.lam@gmail.com' => 'Khương An']);
                $message->setCc(['nguyentuansieu@gmail.com' => 'Siêu™']);
//                    }
//                    if(!empty($model->cc_email)) {
//                        $message->setCc([$model->cc_email, $model->cc_name]);
//                    }
//                    if(!empty($model->to_email)) {
//                        $message->setBcc([$model->bcc_email, $model->bcc_name]);
//                    }

                $message->setFrom(['no-reply@ideasvn.com' => 'Dream Paradise Media']);
                $message->setReplyTo([$model->email => $model->name]);

                $message->setSubject($model->name . ' liên hệ từ dự án ' . $projectName)
                    ->setHtmlBody($body)
                    ->send();
            } catch (\Swift_SwiftException $e) {
                $response->statusCode = 500;
                $data = [
                    'message' => 'Có lỗi trong quá trình gửi mail. Vui lòng thử lại',
                    'status' => false
                ];
                return $response->data = $data;
            }

            $response->statusCode = 200;
            $data = [
                'message' => 'Gửi liên hệ thành công',
                'status' => true
            ];
            return $response->data = $data;
        } else {
            $response->statusCode = 500;
            $data = [
                'message' => $model->getFirstErrors(),
                'status' => false
            ];
            return $response->data = $data;
        }

    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function actionThanks() {
        echo 'Cảm ơn bạn đã liên hệ. Email của bạn sẽ được trả lời sớm nhất';
        echo Yii::$app->view->registerMetaTag(["3;url=/", null, 'refresh']);
    }
}
