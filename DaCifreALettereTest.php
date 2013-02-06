<?php
require_once 'DaCifreALettere.php';
/**
 * Created by JetBrains PhpStorm.
 * User: mauro@bjmaster.com
 * Date: 05/02/13
 * Time: 10.05
 * To change this template use File | Settings | File Templates.
 */
class DaCifreALettereTest extends PHPUnit_Framework_TestCase{
    /**
     * Oggetto da testare
     *
     * @var DaCifreALettere
     */
    public $daCifreALettere;

    public function setUp(){
        $this->daCifreALettere= new DaCifreALettere(0);
    }

    public function testGetCifreNumeri(){
        $numero=144;

        $result=$this->daCifreALettere->getCifreNumeri($numero);

        $expected=array(
            0 => array(
                4,4,1
            )
        );

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereZero(){
        $numero=0;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='zero';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereUno(){
        $numero=1;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='uno';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereDieci(){
        $numero=10;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='dieci';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereDieciVenti(){
        $numero=314;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='trecentoquattordici';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereDecine(){
        $numero=20;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='venti';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereCento(){
        $numero=101;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='centouno';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereCentinaia(){
        $numero=344;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='trecentoquarantaquattro';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereMille(){
        $numero=1012;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='milledodici';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereMigliaia(){
        $numero=3122;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='tremilacentoventidue';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereCentinaiaMigliaia(){
        $numero=320112;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='trecentoventimilacentododici';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereUnMilione(){
        $numero=1320112;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='unmilionetrecentoventimilacentododici';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereMilioni(){
        $numero=15320112;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='quindicimilionitrecentoventimilacentododici';

        $this->assertEquals($expected, $result);
    }

    public function testGetStringaLettereMiliardi(){
        $numero=356215320112;

        $gruppiCifre=$this->daCifreALettere->getCifreNumeri($numero);

        $result=$this->daCifreALettere->getStringaLettere($gruppiCifre);

        $expected='trecentocinquantaseimiliardiduecentoquindicimilionitrecentoventimilacentododici';

        $this->assertEquals($expected, $result);
    }
}