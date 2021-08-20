<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tracking}}`.
 */
class m210819_055547_create_tracking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tracking}}', [
            'id' => $this->primaryKey(),
            'ref'=>$this->string(255),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(255),
            'pname' => $this->string()->notNull()->comment('คำนำหน้า'),
            'fname' => $this->string()->notNull()->comment('ชื่อ'),
            'lname' => $this->string()->notNull()->comment('นามสกุล'),
            'affiliation' => $this->string()->notNull()->comment('สังกัด'),
            'position' => $this->integer()->notNull()->comment("ขอกำหนดตำแหน่ง"),
            'position_type' => $this->string()->notNull()->comment("โดยวิธี"),
            'position_way' => $this->string()->notNull()->comment("วิธีที่"),
            'reader' => $this->json()->notNull()->comment("Reader"),
            'branch' => $this->string()->notNull()->comment("ในสาขาวิชา"),
            'branch_code' => $this->integer()->notNull()->comment("รหัสสาขาวิชา"),
            'local_meeting_date' => $this->date()->comment('วันประชุมคณะกรรมการประจำส่วนงาน'),
            'hr_getsubject_date' => $this->date()->comment('วันที่กองทรัพยากรบุคคลรับเรื่อง'),
            'step1' => $this->integer()->comment('ขั้นที่ 1 กองทรัพยากรบุคคลรับเรื่องจากคณะ/หน่วยงาน'),
            'step1_comment' => $this->string()->comment('หมายเหตุ'),
            'step2' => $this->integer()->comment('ขั้นที่ 2 นำเรื่องเสนอคณะกรรมการพิจารณาตำแหน่งทางวิชาการ เพื่อพิจารณารายละเอียดของผลงานทางวิชาการและรายชื่อผู้ทรงคุณวุฒิ'),
            'step2_comment' => $this->string()->comment('หมายเหตุ'),

            'step3' => $this->integer()->comment('ขั้นที่ 3 ติดต่อทาบทามคณะกรรมการผู้ทรงคุณวุฒิ เพื่อทำหน้าที่ประเมินผลงานทางวิชาการ'),
            'step3_comment' => $this->string()->comment('หมายเหตุ'),

            'step4' => $this->integer()->comment('ขั้นที่ 4 รอผลการทาบทามคณะกรรมการผู้ทรงคุณวุฒิทำหน้าที่ประเมินผลงานทางวิชาการ'),
            'step4_comment' => $this->string()->comment('หมายเหตุ'),

            'step5' => $this->integer()->comment('ขั้นที่ 5 ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน'),
            'step5_comment' => $this->string()->comment('หมายเหตุ'),
            'step5_date' => $this->date()->comment('ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน'),

            'step6' => $this->integer()->comment('ขั้นที่ 6 ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการทุกวันพฤหัสบดีที่ 3 ของทุกเดือน'),
            'step6_comment' => $this->string()->comment('หมายเหตุ'),
            'step6_date' => $this->date()->comment('วันที่ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการ'),

            'step7' => $this->integer()->comment('ขั้นที่ 7 นำเรื่องเสนอที่ประชุมสภามหาวิทยาลัย'),
            'step7_comment' => $this->string()->comment('หมายเหตุ'),
            'step7_date' => $this->date()->comment('วันที่ประชุมสภามหาวิทยาลัย'),

            'step8' => $this->integer()->comment('ขั้นที่ 8 คำสั่งแต่งตั้งให้ดำรงตำแหน่งทางวิชาการ'),
            'step8_comment' => $this->string()->comment('หมายเหตุ'),
            'success' => $this->boolean()->comment('กระบวนขอตำแหน่งทางวิชาการเสร็จสิ้นแล้วหรือไม่')


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tracking}}');
    }
}
