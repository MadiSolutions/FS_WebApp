<?php
class DeclaracionJurada
{
    public $user,$empresa;
    public $cyc_p1,$cyc_p2,$cyc_p3,$cyc_p4,$cyc_p5,$cyc_p6,$cyc_p7,$cyc_p8,$cyc_p9,$cyc_p10,$cyc_p11;//cabeza y cuello
    public $sr_p1,$sr_p2,$sr_p3,$sr_p4,$sr_p5,$sr_p6,$sr_p7,$sr_p8,$sr_p9,$sr_p10,$sr_p11; //sistema respiratorio
    public $sce_p1,$sce_p2,$sce_p3,$sce_p4,$sce_p5,$sce_p6,$sce_p7,$sce_p8,$sce_p9,$sce_p10,$sce_p11; //sistema cardiovascular - endocrino
    public $sd_p1,$sd_p2,$sd_p3,$sd_p4,$sd_p5,$sd_p6,$sd_p7,$sd_p8,$sd_p9,$sd_p10,$sd_p11; //sistema disgestivo
    public $sg_p1,$sg_p2,$sg_p3,$sg_p4,$sg_p5,$sg_p6,$sg_p7; //sistema genitourinario
    public $i_p1,$i_p2,$i_p3,$i_p4,$i_p5,$i_p6,$i_p7; //infectologia
    public $f_p1,$f_p2,$f_p3,$f_p4,$f_p5,$f_p6,$f_p7,$f_p8,$f_p9,$f_p10,$f_p11; // familia
    public $o_p1,$o_p2,$o_p3,$o_p4,$o_p5,$o_p6,$o_p7,$o_p8,$o_p9,$o_p10,$o_p11,$o_p12,$o_p13,$o_p14,$o_p15,$o_p16;//otros
    public $sme_p1,$sme_p2,$sme_p3,$sme_p4,$sme_p5,$sme_p6,$sme_p7,$sme_p8,$sme_p9,$sme_p10;//sistema musculo esqueletico
    public $vc_p1,$vc_p2,$vc_p3,$vc_p4;//vacunas recibidas
    public $so_p1,$so_p2;//sistema oftalmologico
    public $spm_p1,$spm_p2,$spm_p3,$spm_p4,$spm_p5,$spm_p6; //solo para mujeres
    public $hdv_p1,$hdv_p2,$hdv_p3,$hdv_p4,$hdv_p5,$hdv_p6; //habitos de vida
    public $do_p1,$do_p2; //division odontologica
    public $ho_p1,$ho_p2,$ho_p3,$ho_p4,$ho_p5,$ho_p6,$ho_p7,$ho_p8,$ho_p9,$ho_p10,$ho_p11,$ho_p12,$ho_p13,$ho_p14,$ho_p15i,$ho_p15f; //historia ocupacional
    
    function __construct($user,$empresa,$cyc_p1,$cyc_p2,$cyc_p3,$cyc_p4,$cyc_p5,$cyc_p6,$cyc_p7,$cyc_p8,$cyc_p9,$cyc_p10,$cyc_p11,
                    /*2*/    $sr_p1,$sr_p2,$sr_p3,$sr_p4,$sr_p5,$sr_p6,$sr_p7,$sr_p8,$sr_p9,$sr_p10,$sr_p11,
                    /*3*/    $sce_p1,$sce_p2,$sce_p3,$sce_p4,$sce_p5,$sce_p6,$sce_p7,$sce_p8,$sce_p9,$sce_p10,$sce_p11,
                    /*4*/    $sd_p1,$sd_p2,$sd_p3,$sd_p4,$sd_p5,$sd_p6,$sd_p7,$sd_p8,$sd_p9,$sd_p10,$sd_p11,
                    /*5*/    $sg_p1,$sg_p2,$sg_p3,$sg_p4,$sg_p5,$sg_p6,$sg_p7,
                    /*6*/    $i_p1,$i_p2,$i_p3,$i_p4,$i_p5,$i_p6,$i_p7,
                    /*7*/    $f_p1,$f_p2,$f_p3,$f_p4,$f_p5,$f_p6,$f_p7,$f_p8,$f_p9,$f_p10,$f_p11,
                    /*8*/    $o_p1,$o_p2,$o_p3,$o_p4,$o_p5,$o_p6,$o_p7,$o_p8,$o_p9,$o_p10,$o_p11,$o_p12,$o_p13,$o_p14,$o_p15,$o_p16,
                    /*9*/    $sme_p1,$sme_p2,$sme_p3,$sme_p4,$sme_p5,$sme_p6,$sme_p7,$sme_p8,$sme_p9,$sme_p10,
                    /*10*/   $vc_p1,$vc_p2,$vc_p3,$vc_p4,
                    /*11*/   $so_p1,$so_p2,
                    /*12*/   $spm_p1,$spm_p2,$spm_p3,$spm_p4,$spm_p5,$spm_p6,
                    /*13*/   $hdv_p1,$hdv_p2,$hdv_p3,$hdv_p4,$hdv_p5,$hdv_p6,
                    /*14*/   $do_p1,$do_p2,
                    /*15*/   $ho_p1,$ho_p2,$ho_p3,$ho_p4,$ho_p5,$ho_p6,$ho_p7,$ho_p8,$ho_p9,$ho_p10,$ho_p11,$ho_p12,$ho_p13,$ho_p14,$ho_p15i,$ho_p15f)
    {
        $this->user = $user;
        $this->empresa = $empresa;
        /*1*/
        $this->cyc_p1 = $cyc_p1;
        $this->cyc_p2 = $cyc_p2;
        $this->cyc_p3 = $cyc_p3; 
        $this->cyc_p4 = $cyc_p4; 
        $this->cyc_p5 = $cyc_p5; 
        $this->cyc_p6 = $cyc_p6; 
        $this->cyc_p7 = $cyc_p7; 
        $this->cyc_p8 = $cyc_p8; 
        $this->cyc_p9 = $cyc_p9; 
        $this->cyc_p10 = $cyc_p10; 
        $this->cyc_p11 = $cyc_p11;
        /*2*/
        $this->sr_p1 = $sr_p1;
        $this->sr_p2 = $sr_p2;
        $this->sr_p3 = $sr_p3;
        $this->sr_p4 = $sr_p4;
        $this->sr_p5 = $sr_p5;
        $this->sr_p6 = $sr_p6;
        $this->sr_p7 = $sr_p7;
        $this->sr_p8 = $sr_p8;
        $this->sr_p9 = $sr_p9;
        $this->sr_p10 = $sr_p10;
        $this->sr_p11 = $sr_p11;
        /*3*/
        $this->sce_p1 = $sce_p1;
        $this->sce_p2 = $sce_p2;
        $this->sce_p3 = $sce_p3;
        $this->sce_p4 = $sce_p4;
        $this->sce_p5 = $sce_p5;
        $this->sce_p6 = $sce_p6;
        $this->sce_p7 = $sce_p7;
        $this->sce_p8 = $sce_p8;
        $this->sce_p9 = $sce_p9;
        $this->sce_p10 = $sce_p10;
        $this->sce_p11 = $sce_p11;
        /*4*/
        $this->sd_p1 = $sd_p1;
        $this->sd_p2 = $sd_p2;
        $this->sd_p3 = $sd_p3;
        $this->sd_p4 = $sd_p4;
        $this->sd_p5 = $sd_p5;
        $this->sd_p6 = $sd_p6;
        $this->sd_p7 = $sd_p7;
        $this->sd_p8 = $sd_p8;
        $this->sd_p9 = $sd_p9;
        $this->sd_p10 = $sd_p10;
        $this->sd_p11 = $sd_p11;
        /*5*/
        $this->sg_p1 = $sg_p1;
        $this->sg_p2 = $sg_p2;
        $this->sg_p3 = $sg_p3;
        $this->sg_p4 = $sg_p4;
        $this->sg_p5 = $sg_p5;
        $this->sg_p6 = $sg_p6;
        $this->sg_p7 = $sg_p7;
        /*6*/
        $this->i_p1 = $i_p1;
        $this->i_p2 = $i_p2;
        $this->i_p3 = $i_p3;
        $this->i_p4 = $i_p4;
        $this->i_p5 = $i_p5;
        $this->i_p6 = $i_p6;
        $this->i_p7 = $i_p7;
        /*7*/
        $this->f_p1 = $f_p1;
        $this->f_p2 = $f_p2;
        $this->f_p3 = $f_p3;
        $this->f_p4 = $f_p4;
        $this->f_p5 = $f_p5;
        $this->f_p6 = $f_p6;
        $this->f_p7 = $f_p7;
        $this->f_p8 = $f_p8;
        $this->f_p9 = $f_p9;
        $this->f_p10 = $f_p10;
        $this->f_p11 = $f_p11;
        /*8*/
        $this->o_p1 = $o_p1;
        $this->o_p2 = $o_p2;
        $this->o_p3 = $o_p3;
        $this->o_p4 = $o_p4;
        $this->o_p5 = $o_p5;
        $this->o_p6 = $o_p6;
        $this->o_p7 = $o_p7;
        $this->o_p8 = $o_p8;
        $this->o_p9 = $o_p9;
        $this->o_p10 = $o_p10;
        $this->o_p11 = $o_p11;
        $this->o_p12 = $o_p12;
        $this->o_p13 = $o_p13;
        $this->o_p14 = $o_p14;
        $this->o_p15 = $o_p15;
        $this->o_p16 = $o_p16;
        /*9*/
        $this->sme_p1 = $sme_p1;
        $this->sme_p2 = $sme_p2;
        $this->sme_p3 = $sme_p3;
        $this->sme_p4 = $sme_p4;
        $this->sme_p5 = $sme_p5;
        $this->sme_p6 = $sme_p6;
        $this->sme_p7 = $sme_p7;
        $this->sme_p8 = $sme_p8;
        $this->sme_p9 = $sme_p9;
        $this->sme_p10 = $sme_p10;
        /*10*/
        $this->vc_p1 = $vc_p1;
        $this->vc_p2 = $vc_p2;
        $this->vc_p3 = $vc_p3;
        $this->vc_p4 = $vc_p4;
        /*11*/
        $this->so_p1 = $so_p1;
        $this->so_p2 = $so_p2;
        /*12*/
        $this->spm_p1 = $spm_p1;
        $this->spm_p2 = $spm_p2;
        $this->spm_p3 = $spm_p3;
        $this->spm_p4 = $spm_p4;
        $this->spm_p5 = $spm_p5;
        $this->spm_p6 = $spm_p6;
        /*13*/
        $this->hdv_p1 = $hdv_p1;
        $this->hdv_p2 = $hdv_p2;
        $this->hdv_p3 = $hdv_p3;
        $this->hdv_p4 = $hdv_p4;
        $this->hdv_p5 = $hdv_p5;
        $this->hdv_p6 = $hdv_p6;
        /*14*/
        $this->do_p1 = $do_p1;
        $this->do_p2 = $do_p2;
        /*15*/
        $this->ho_p1 = $ho_p1;
        $this->ho_p2 = $ho_p2;
        $this->ho_p3 = $ho_p3;
        $this->ho_p4 = $ho_p4;
        $this->ho_p5 = $ho_p5;
        $this->ho_p6 = $ho_p6;
        $this->ho_p7 = $ho_p7;
        $this->ho_p8 = $ho_p8;
        $this->ho_p9 = $ho_p9;
        $this->ho_p10 = $ho_p10;
        $this->ho_p11 = $ho_p11;
        $this->ho_p12 = $ho_p12;
        $this->ho_p13 = $ho_p13;
        $this->ho_p14 = $ho_p14;
        $this->ho_p15i = $ho_p15i;
        $this->ho_p15f = $ho_p15f;

    }

    public function Agregar($con)
    {      
        $hoy = date("Y-m-d");
        $insertar = "INSERT INTO rptas_declaracionjurada (cod_rpta, dni, cod_preg, rpta, fecha) 
        VALUES('cyc_r1' , '$this->user' , 'cyc_p1' , '$this->cyc_p1' , '$hoy'),
                ('cyc_r2' , '$this->user' , 'cyc_p2' , '$this->cyc_p2' , '$hoy'),
                ('cyc_r3' , '$this->user' , 'cyc_p3' , '$this->cyc_p3' , '$hoy'),
                ('cyc_r4' , '$this->user' , 'cyc_p4' , '$this->cyc_p4' , '$hoy'),
                ('cyc_r5' , '$this->user' , 'cyc_p5' , '$this->cyc_p5' , '$hoy'),
                ('cyc_r6' , '$this->user' , 'cyc_p6' , '$this->cyc_p6' , '$hoy'),
                ('cyc_r7' , '$this->user' , 'cyc_p7' , '$this->cyc_p7' , '$hoy'),
                ('cyc_r8' , '$this->user' , 'cyc_p8' , '$this->cyc_p8' , '$hoy'),
                ('cyc_r9' , '$this->user' , 'cyc_p9' , '$this->cyc_p9' , '$hoy'),
                ('cyc_r10' , '$this->user' , 'cyc_p10' , '$this->cyc_p10' , '$hoy'),
                ('cyc_r11' , '$this->user' , 'cyc_p11' , '$this->cyc_p11' , '$hoy'),
                /*2*/
                ('sr_r1' , '$this->user' , 'sr_p1' , '$this->sr_p1' , '$hoy'),
                ('sr_r2' , '$this->user' , 'sr_p2' , '$this->sr_p2' , '$hoy'),
                ('sr_r3' , '$this->user' , 'sr_p3' , '$this->sr_p3' , '$hoy'),
                ('sr_r4' , '$this->user' , 'sr_p4' , '$this->sr_p4' , '$hoy'),
                ('sr_r5' , '$this->user' , 'sr_p5' , '$this->sr_p5' , '$hoy'),
                ('sr_r6' , '$this->user' , 'sr_p6' , '$this->sr_p6' , '$hoy'),
                ('sr_r7' , '$this->user' , 'sr_p7' , '$this->sr_p7' , '$hoy'),
                ('sr_r8' , '$this->user' , 'sr_p8' , '$this->sr_p8' , '$hoy'),
                ('sr_r9' , '$this->user' , 'sr_p9' , '$this->sr_p9' , '$hoy'),
                ('sr_r10' , '$this->user' , 'sr_p10' ,'$this->sr_p10' , '$hoy'),
                ('sr_r11' , '$this->user' , 'sr_p11' ,'$this->sr_p11' , '$hoy'),
                /*3*/
                ('sce_r1','$this->user' , 'sce_p1' , '$this->sce_p1' , '$hoy'),
                ('sce_r2','$this->user' , 'sce_p2' , '$this->sce_p2' , '$hoy'),
                ('sce_r3','$this->user' , 'sce_p3' , '$this->sce_p3' , '$hoy'),
                ('sce_r4','$this->user' , 'sce_p4' , '$this->sce_p4' , '$hoy'),
                ('sce_r5','$this->user' , 'sce_p5' , '$this->sce_p5' , '$hoy'),
                ('sce_r6','$this->user' , 'sce_p6' , '$this->sce_p6' , '$hoy'),
                ('sce_r7','$this->user' , 'sce_p7' , '$this->sce_p7' , '$hoy'),
                ('sce_r8','$this->user' , 'sce_p8' , '$this->sce_p8' , '$hoy'),
                ('sce_r9','$this->user' , 'sce_p9' , '$this->sce_p9' , '$hoy'),
                ('sce_r10','$this->user' , 'sce_p10' , '$this->sce_p10' , '$hoy'),
                ('sce_r11','$this->user' , 'sce_p11' , '$this->sce_p11' , '$hoy'),
                /*4*/
                ('sd_r1','$this->user' , 'sd_p1' , '$this->sd_p1' , '$hoy'), 
                ('sd_r2','$this->user' , 'sd_p2' , '$this->sd_p2' , '$hoy'), 
                ('sd_r3','$this->user' , 'sd_p3' , '$this->sd_p3' , '$hoy'), 
                ('sd_r4','$this->user' , 'sd_p4' , '$this->sd_p4' , '$hoy'), 
                ('sd_r5','$this->user' , 'sd_p5' , '$this->sd_p5' , '$hoy'), 
                ('sd_r6','$this->user' , 'sd_p6' , '$this->sd_p6' , '$hoy'), 
                ('sd_r7','$this->user' , 'sd_p7' , '$this->sd_p7' , '$hoy'), 
                ('sd_r8','$this->user' , 'sd_p8' , '$this->sd_p8' , '$hoy'), 
                ('sd_r9','$this->user' , 'sd_p9' , '$this->sd_p9' , '$hoy'), 
                ('sd_r10','$this->user' , 'sd_p10' , '$this->sd_p10' , '$hoy'),
                ('sd_r11','$this->user' , 'sd_p11' , '$this->sd_p11' , '$hoy'),
                /*5*/
                ('sg_r1','$this->user' , 'sg_p1' , '$this->sg_p1' , '$hoy'), 
                ('sg_r2','$this->user' , 'sg_p2' , '$this->sg_p2' , '$hoy'), 
                ('sg_r3','$this->user' , 'sg_p3' , '$this->sg_p3' , '$hoy'), 
                ('sg_r4','$this->user' , 'sg_p4' , '$this->sg_p4' , '$hoy'), 
                ('sg_r5','$this->user' , 'sg_p5' , '$this->sg_p5' , '$hoy'), 
                ('sg_r6','$this->user' , 'sg_p6' , '$this->sg_p6' , '$hoy'), 
                ('sg_r7','$this->user' , 'sg_p7' , '$this->sg_p7' , '$hoy'),
                /*6*/
                ('i_r1','$this->user' , 'i_p1' , '$this->i_p1' , '$hoy'),
                ('i_r2','$this->user' , 'i_p2' , '$this->i_p2' , '$hoy'),
                ('i_r3','$this->user' , 'i_p3' , '$this->i_p3' , '$hoy'),
                ('i_r4','$this->user' , 'i_p4' , '$this->i_p4' , '$hoy'),
                ('i_r5','$this->user' , 'i_p5' , '$this->i_p5' , '$hoy'),
                ('i_r6','$this->user' , 'i_p6' , '$this->i_p6' , '$hoy'),
                ('i_r7','$this->user' , 'i_p7' , '$this->i_p7' , '$hoy'),
                /*7*/
                ('f_r1','$this->user' , 'f_p1' , '$this->f_p1' , '$hoy'),
                ('f_r2','$this->user' , 'f_p2' , '$this->f_p2' , '$hoy'),
                ('f_r3','$this->user' , 'f_p3' , '$this->f_p3' , '$hoy'),
                ('f_r4','$this->user' , 'f_p4' , '$this->f_p4' , '$hoy'),
                ('f_r5','$this->user' , 'f_p5' , '$this->f_p5' , '$hoy'),
                ('f_r6','$this->user' , 'f_p6' , '$this->f_p6' , '$hoy'),
                ('f_r7','$this->user' , 'f_p7' , '$this->f_p7' , '$hoy'),
                ('f_r8','$this->user' , 'f_p8' , '$this->f_p8' , '$hoy'),
                ('f_r9','$this->user' , 'f_p9' , '$this->f_p9' , '$hoy'),
                ('f_r10','$this->user' , 'f_p10' , '$this->f_p10' , '$hoy'),
                ('f_r11','$this->user' , 'f_p11' , '$this->f_p11' , '$hoy'),
                /*8*/
                ('o_r1','$this->user' , 'o_p1' , '$this->o_p1' , '$hoy'),
                ('o_r2','$this->user' , 'o_p2' , '$this->o_p2' , '$hoy'),
                ('o_r3','$this->user' , 'o_p3' , '$this->o_p3' , '$hoy'),
                ('o_r4','$this->user' , 'o_p4' , '$this->o_p4' , '$hoy'),
                ('o_r5','$this->user' , 'o_p5' , '$this->o_p5' , '$hoy'),
                ('o_r6','$this->user' , 'o_p6' , '$this->o_p6' , '$hoy'),
                ('o_r7','$this->user' , 'o_p7' , '$this->o_p7' , '$hoy'),
                ('o_r8','$this->user' , 'o_p8' , '$this->o_p8' , '$hoy'),
                ('o_r9','$this->user' , 'o_p9' , '$this->o_p9' , '$hoy'),
                ('o_r10','$this->user' , 'o_p10' , '$this->o_p10' , '$hoy'),
                ('o_r11','$this->user' , 'o_p11' , '$this->o_p11' , '$hoy'),
                ('o_r12','$this->user' , 'o_p12' , '$this->o_p12' , '$hoy'),
                ('o_r13','$this->user' , 'o_p13' , '$this->o_p13' , '$hoy'),
                ('o_r14','$this->user' , 'o_p14' , '$this->o_p14' , '$hoy'),
                ('o_r15','$this->user' , 'o_p15' , '$this->o_p15' , '$hoy'),
                ('o_r16','$this->user' , 'o_p16' , '$this->o_p16' , '$hoy'),
                /*9*/
                ('sme_r1','$this->user' , 'sme_p1' , '$this->sme_p1' , '$hoy'),
                ('sme_r2','$this->user' , 'sme_p2' , '$this->sme_p2' , '$hoy'),
                ('sme_r3','$this->user' , 'sme_p3' , '$this->sme_p3' , '$hoy'),
                ('sme_r4','$this->user' , 'sme_p4' , '$this->sme_p4' , '$hoy'),
                ('sme_r5','$this->user' , 'sme_p5' , '$this->sme_p5' , '$hoy'),
                ('sme_r6','$this->user' , 'sme_p6' , '$this->sme_p6' , '$hoy'),
                ('sme_r7','$this->user' , 'sme_p7' , '$this->sme_p7' , '$hoy'),
                ('sme_r8','$this->user' , 'sme_p8' , '$this->sme_p8' , '$hoy'),
                ('sme_r9','$this->user' , 'sme_p9' , '$this->sme_p9' , '$hoy'),
                ('sme_r10','$this->user' , 'sme_p10' , '$this->sme_p10' , '$hoy'),
                /*10*/
                ('vc_r1','$this->user' , 'vc_p1' , '$this->vc_p1' , '$hoy'),
                ('vc_r2','$this->user' , 'vc_p2' , '$this->vc_p2' , '$hoy'),
                ('vc_r3','$this->user' , 'vc_p3' , '$this->vc_p3' , '$hoy'),
                ('vc_r4','$this->user' , 'vc_p4' , '$this->vc_p4' , '$hoy'),
                /*11*/
                ('so_r1','$this->user' , 'so_p1' , '$this->so_p1' , '$hoy'),
                ('so_r2','$this->user' , 'so_p2' , '$this->so_p2' , '$hoy'),
                /*12*/
                ('spm_r1','$this->user' , 'spm_p1' , '$this->spm_p1' , '$hoy'),
                ('spm_r2','$this->user' , 'spm_p2' , '$this->spm_p2' , '$hoy'),
                ('spm_r3','$this->user' , 'spm_p3' , '$this->spm_p3' , '$hoy'),
                ('spm_r4','$this->user' , 'spm_p4' , '$this->spm_p4' , '$hoy'),
                ('spm_r5','$this->user' , 'spm_p5' , '$this->spm_p5' , '$hoy'),
                ('spm_r6','$this->user' , 'spm_p6' , '$this->spm_p6' , '$hoy'),
                /*13*/
                ('hdv_r1','$this->user' , 'hdv_p1' , '$this->hdv_p1' , '$hoy'),
                ('hdv_r2','$this->user' , 'hdv_p2' , '$this->hdv_p2' , '$hoy'),
                ('hdv_r3','$this->user' , 'hdv_p3' , '$this->hdv_p3' , '$hoy'),
                ('hdv_r4','$this->user' , 'hdv_p4' , '$this->hdv_p4' , '$hoy'),
                ('hdv_r5','$this->user' , 'hdv_p5' , '$this->hdv_p5' , '$hoy'),
                ('hdv_r6','$this->user' , 'hdv_p6' , '$this->hdv_p6' , '$hoy'),
                /*14*/
                ('do_r1','$this->user' , 'do_p1' , '$this->do_p1' , '$hoy'),
                ('do_r2','$this->user' , 'do_p2' , '$this->do_p2' , '$hoy'),
                /*15*/
                ('ho_r1','$this->user' , 'ho_p1' , '$this->ho_p1' , '$hoy'),
                ('ho_r2','$this->user' , 'ho_p2' , '$this->ho_p2' , '$hoy'),
                ('ho_r3','$this->user' , 'ho_p3' , '$this->ho_p3' , '$hoy'),
                ('ho_r4','$this->user' , 'ho_p4' , '$this->ho_p4' , '$hoy'),
                ('ho_r5','$this->user' , 'ho_p5' , '$this->ho_p5' , '$hoy'),
                ('ho_r6','$this->user' , 'ho_p6' , '$this->ho_p6' , '$hoy'),
                ('ho_r7','$this->user' , 'ho_p7' , '$this->ho_p7' , '$hoy'),
                ('ho_r8','$this->user' , 'ho_p8' , '$this->ho_p8' , '$hoy'),
                ('ho_r9','$this->user' , 'ho_p9' , '$this->ho_p9' , '$hoy'),
                ('ho_r10','$this->user' , 'ho_p10' , '$this->ho_p10' , '$hoy'),
                ('ho_r11','$this->user' , 'ho_p11' , '$this->ho_p11' , '$hoy'),
                ('ho_r12','$this->user' , 'ho_p12' , '$this->ho_p12' , '$hoy'),
                ('ho_r13','$this->user' , 'ho_p13' , '$this->ho_p13' , '$hoy'),
                ('ho_r14','$this->user' , 'ho_p14' , '$this->ho_p14' , '$hoy'),
                ('ho_r15i','$this->user' , 'ho_p15i' , '$this->ho_p15i' , '$hoy'),
                ('ho_r15f','$this->user' , 'ho_p15f' , '$this->ho_p15f' , '$hoy')";


        $insertar1 = "INSERT INTO historico_declaracionesjuradas(dni, empresa, fecha,estado) VALUES ('$this->user','$this->empresa','$hoy',1)";
        $exe = mysqli_query($con, $insertar);
        $exe1 = mysqli_query($con, $insertar1);
        if ($exe !== false && $exe1 !== false) {
            MensajeExitoso("Declaracion Registrada al Sistema");
        } else {
            MensajeError("Declaracion con Error en Registro");
        }
    }

    /*public function Modificar($con)
    {
        $modificar = "UPDATE usuarios SET nombre = '$this->nombre', direccion = '$this->direccion', telefono = '$this->telefono',correo = '$this->correo',tipo_user='$this->cargo' WHERE dni = '$this->dni'";
        $exe = mysqli_query($con, $modificar);
        if ($exe !== false) {
            MensajeExitoso("Medico Modificado");
        } else {
            MensajeError("El Medico No Pudo Ser Modificado");
        }
    }*/

    public function Eliminar($con)
    {
        $eliminar = "UPDATE historico_declaracionesjuradas SET estado='0' WHERE cod_declaracionjurada = '$this->user'"; // el primer valor que recibimos es el codigo de declracion pero esta declarado como user en nuestra clase
        $exe = mysqli_query($con, $eliminar);
        if ($exe !== false) {
            MensajeExitoso("Declaracion Jurada Eliminada del Sistema");
        } else {
            MensajeError("Declaracion Jurada No Pudo Ser Eliminada");
        }
    }
}
