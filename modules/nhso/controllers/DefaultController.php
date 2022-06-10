<?php

namespace app\modules\nhso\controllers;

use yii\web\Controller;
use app\components\NhsoCheck;

/**
 * Default controller for the `nhso` module
 */
class DefaultController extends Controller {

    // ฟังก์ชั่นตรวจสอบสิทธิ
    protected function nhso_check($user_cid, $token, $patient_cid) {
        $args = [
            'user_person_id' => $user_cid,
            'smctoken' => $token,
            'person_id' => $patient_cid
        ];
        $soap_client = new \SoapClient("http://ucws.nhso.go.th:80/ucwstokenp1/UCWSTokenP1?wsdl");
        $resp = $soap_client->__soapCall("searchCurrentByPID", [$args]);

        return get_object_vars($resp->return);
    }

    public function actionIndex() {
        if (\Yii::$app->request->isPost) {

            // เลขบัตรปชช.เจ้าหน้าที่รพ.
            $user_cid = '3659900129473';  // ดึงจากฐาน
            // token สปสช 
            $token = '58ptk97n14k236k2';  // ดึงจากฐาน

            $patient_cid = \Yii::$app->request->post('patient_cid');
            $resp = $this->nhso_check($user_cid, $token, $patient_cid);
            
            return $this->render('index', [
                        'resp' => $resp
            ]);
        }
        return $this->render('index');
    }

}
