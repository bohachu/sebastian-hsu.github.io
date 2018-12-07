<!--
//==================== for zip code begin =========================
County = new Array( "�x�_��","�򶩥�","�x�_��","�y����","�s�˥�","�s�˿�","��鿤","�]�߿�",
                             "�x����","�x����","���ƿ�","�n�뿤","�Ÿq��","�Ÿq��","���L��","�x�n��",
                             "�x�n��","������","������","���","�̪F��","�x�F��","�Ὤ��","������",
                             "�s����","�n���Ѯq","�����x�C��","�~��");//���٦U����
Zone = new Array(28);
Zone[0] = new Array("������","�j�P��","���s��","�Q�s��","�j�w��","�U�ذ�","�H�q��","�h�L��",
                             "�_���","�����","�n���","��s��");//�x�_��
Zone[1] = new Array("���R��","�H�q��","������","���s��","�w�ְ�","�x�x��","�C����");//�򶩥�
Zone[2] = new Array("�U���m","���s�m","�O����","���","�`�|�m","����m","�����","���˶m",
                             "���˶m","�^�d�m","�s����","�W�L�m","�Q�Ӷm","�éM��","���M��","�g����",
                             "�T�l��","��L��","�a�q��","�T����","�s����","���s�m","�L�f�m","Ī�w��",
                             "���Ѷm","�K���m","�H����","�T�۶m","�۪��m");//�x�_��
Zone[3] = new Array("�y����","�Y����","�G�˶m","����m","���s�m","ù�F��","�T�P�m","�j�P�m",
                             "�����m","�V�s�m","Ĭ�D��","�n�D�m");//�y����
Zone[4] = new Array("");//�s�˥�
Zone[5] = new Array("�˥_��","��f�m","�s�׶m","�s�H�m","������","�|�L�m","�_�s�m","�˪F��",
                             "���p�m","��s�m","�y�۶m","�_�H�m","�o�ݶm");//�s�˿�
Zone[6] = new Array("���c��","����","�s��m","������","�s�ζm","�[���m","��饫","�t�s�m",
                             "�K�w��","�j����","�_���m","�j��m","Ī�˶m");//��鿤
Zone[7] = new Array("�˫n��","�Y����","�T�W�m","�n�ܶm","���m","���s��","�q�]��","�b����",
                             "�]�ߥ�","�y���m","�Y�ζm","���]�m","�j��m","���w�m","���r�m","�T�q�m",
                             "���m","�����m");//�]�߿�
Zone[8] = new Array("����","�F��","�n��","���","�_��","�_�ٰ�","��ٰ�","�n�ٰ�");//�x����
Zone[9] = new Array("�ӥ���","�j����","���p�m","�Q��m","�׭쥫","�Z���m","�۩��m","�F����",
                             "�M���m","�s���m","��l�m","�j���m","�����m","�j�{�m","�F����","�s���m",
                             "�����","�M����","�j����","�~�E�m","�j�w�m");//�x����
Zone[10]= new Array("���ƥ�","���m","��¶m","�q���m","������","�ֿ��m","�u��m","�M����",
                             "����m","���L��","���Y�m","�ùt�m","�H�߶m","�˴���","�j���m","�H�Q�m",
                             "�Ф���","�_����","�Ч��m","���Y�m","�˦{�m","�˶�m","�G�L��","�j���m",
                             "�ڭb�m","�G���m");//���ƿ�
Zone[11]= new Array("�n�륫","���d�m","�����","��m�m","�H����","���R�m","�W���m","�����m",
                             "�����m","�����m","�H�q�m","�ˤs��","�����m");//�n�뿤
Zone[12]= new Array("");//�Ÿq��
Zone[13]= new Array("�f���m","���s�m","�˱T�m","�����s","���H�m","�j�H�m","���W�m","����m",
                             "�ӫO��","���l��","�F�۶m","���}�m","�s��m","�����m","�j�L��","�~�f�m",
                             "�q�˶m","���U��");//�Ÿq��
Zone[14]= new Array("��n��","�j��m","�����","�g�w��","�ǩ��m","�F�նm","�x��m","�[�I�m",
                             "���d�m","�椻��","�L���m","�j�|�m","�l��m","������","�G�[�m","�_����",
                             "���L�m","�f��m","�|��m","�����m");//���L��
Zone[15]= new Array("����","�F��","�n��","���","�_��","�w����","�w�n��");//�x�n��
Zone[16]= new Array("�ñd��","�k���m","�s����","����m","�ɤ��m","����m","�n�ƶm","���w�m",
                             "���q�m","�s�T�m","�x�жm","�¨���","�Ψ���","���m","�C�Ѷm","�N�x�m",
                             "�ǥ���","�_���m","�s�祫","����m","�ժe��","�F�s�m","���Ҷm","�U��m",
                             "�h��m","�Q����","������","�j���m","�s�W�m","�s���m","�w�w�m");//�x�n��
Zone[17]= new Array("�s����","�e����","�d����","�Q�L��","���s��","�X�z��","�e���","�T����",
                             "�����","�p���","�����");//������
Zone[18]= new Array("���Z�m","�j���m","���s��","���˶m","�����m","�мd�m","�P�_�m","���Y�m",
                             "��x�m","�����m","�æw�m","�򤺶m","��s��","�j�d�m","�L��m","���Q�m",
                             "�j��m","�X�s��","���@��","���t�m","�����m","���L�m","�ҥP�m","�緽�m",
                             "�T���m","�Z�L�m","�X�_�m");//������
Zone[19]= new Array("������","�����m","��w�m","�C���m","�ըF�m","���m");//���
Zone[20]= new Array("�̪F��","�T�a��","���x�m","���a�m","�E�p�m","����m","����m","�Q�H�m",
                             "���v�m","�ﬥ�m","�˥жm","���H�m","�U���m","��{��","���Z�m","�Ӹq�m",
                             "�U�r�m","�O���m","�s��m","�n�{�m","�L��m","�F����","�[�y�m","�ΥV�m",
                             "�s��m","�D�d�m","�D�s�m","�K��m","��l�m","�����m","�d���m","��K��",
                             "���{�m");//�̪F��
Zone[21]= new Array("�x�F��","��q�m","�����m","�����m","���n�m","�����m","���s��","���ݶm",
                             "���W�m","�F�e�m","�����\","���ضm","�ӳ¨�","���p�m","�j�Z�m","�F���m");//�x�F��
Zone[22]= new Array("�Ὤ��","�s���m","�q�L�m","�N�w�m","���׶m","��L��","���_�m","���ضm",
                             "���J�m","�U�a�m","�ɨ���","���˶m","�I���m");//�Ὤ��
Zone[23]= new Array("���F��","������","����m","������","�P���m","�Q���m");//������
Zone[24]= new Array("�n��m","�_��m","�����m","�F��");//�s����
Zone[25]= new Array("�F�F","��F");//�n���Ѯq
Zone[26]= new Array("");//�����x�C��
Zone[27]= new Array("");//�~��
ZipCode = new Array(28);
ZipCode[0] = new Array("100","103","104","105","106","108","110","111","112","114","115","116");//�x�_��
ZipCode[1] = new Array("200","201","202","203","204","205","206");//�򶩥�
ZipCode[2] = new Array("207","208","220","221","222","223","224","226","227","228","231","232","233","234","235","236","237","238","239","241","242","243","244","247","248","249","251","252","253");// �x�_��
ZipCode[3] = new Array("260","261","262","263","264","265","266","267","268","269","270","272");//�y����
ZipCode[4] = new Array("300");//�s�˥�
ZipCode[5] = new Array("302","303","304","305","306","307","308","310","311","312","313","314","315");//�s�˿�
ZipCode[6] = new Array("320","324","325","326","327","328","330","333","334","335","336","337","338");//��鿤
ZipCode[7] = new Array("350","351","352","353","354","356","357","358","360","361","362","363","364","365","366","367","368","369");// �]�߿�
ZipCode[8] = new Array("400","401","402","403","404","406","407","408");//�x����
ZipCode[9] = new Array("411","412","413","414","420","421","422","423","424","426","427","428","429","432","433","434","435","436","437","438","439");// �x����
ZipCode[10] = new Array("500","502","503","504","505","506","507","508","509","510","511","5112","513","514","515","516","520","521","522","523","524","525","526","527","528","530");// ���ƿ�
ZipCode[11] = new Array("540","541","542","544","545","546","551","552","553","555","556","557","558");//�n�뿤
ZipCode[12] = new Array("600");//�Ÿq��
ZipCode[13] = new Array("602","603","604","605","606","607","608","611","612","613","614","615","616","621","622","623","624","625");// �Ÿq��
ZipCode[14] = new Array("630","631","632","633","634","635","636","637","638","640","643","646","647","648","649","651","652","653","654","655");// ���L��
ZipCode[15] = new Array("700","701","702","703","704","708","709");//�x�n��
ZipCode[16] = new Array("710","711","712","713","714","715","716","717","718","719","720","721","722","723","724","725","726","727","730","731","732","733","734","735","736","737","741","742","743","744","745");// �x�n��
ZipCode[17] = new Array("800","801","802","803","804","805","806","807","811","812","813");//������
ZipCode[18] = new Array("814","815","820","821","822","823","824","825","826","827","828","829","830","831","832","833","840","842","843","844","845","846","847","848","849","851","852");// ������
ZipCode[19] = new Array("880","881","882","883","884","885");//���
ZipCode[20] = new Array("900","901","902","903","904","905","906","907","908","909","911","912","913","920","921","922","923","924","925","926","927","928","929","931","932","940","941","942","943","944","945","946","947");// �̪F��
ZipCode[21] = new Array("950","951","952","953","954","955","956","957","958","959","961","962","963","964","965","966");
ZipCode[22] = new Array("970","971","972","973","974","975","976","977","978","979","981","982","983");//�Ὤ��
ZipCode[23] = new Array("890","891","892","893","894","896");//������
ZipCode[24] = new Array("209","210","211","212");//�s����
ZipCode[25] = new Array("817","819","290");//�n���Ѯq
ZipCode[26] = new Array("290");//�����x�C��
ZipCode[27] = new Array(" ");//�~��

function initCounty(countyInput) {
    countyInput.length = County.length;
    for (i = 0; i < County.length; i++) {
        countyInput.options[ i ].value = County[ i ];
        countyInput.options[ i ].text = County[ i ];
    }
    countyInput.selectedIndex = 0;
}

function initZone(countyInput, zoneInput, post){
    changeZone(countyInput, zoneInput, post);
}

function changeZone(countyInput, zoneInput, post) {
    selectedCountyIndex = countyInput.selectedIndex;

    zoneInput.length = Zone[selectedCountyIndex].length;
    for (i = 0; i < Zone[selectedCountyIndex].length; i++) {
        zoneInput.options[ i ].value = Zone[selectedCountyIndex][ i ];
        zoneInput.options[ i ].text = Zone[selectedCountyIndex][ i ];
        if (zoneInput.options[ i ].text == "�Q�s��")
              zoneInput.options[ i ].selected = true;
    }
    //zoneInput.selectedIndex = 0;    

    showZipCode(countyInput, zoneInput, post);
}

function showZipCode(countyInput, zoneInput, post) {
    post.value = ZipCode[countyInput.selectedIndex][zoneInput.selectedIndex];
}

function showZone(countyInput,zoneInput,post){
var k=0;l=0;
for (i=0; i < ZipCode.length; i++) {
    for (j=0; j < ZipCode[ i ].length; j++) {
        if ( post == ZipCode[ i ][j] ) {              
              countyInput.length = County.length;              
              for (k = 0; k < countyInput.length; k++) {
                  countyInput.options[k].value = County[k];
                  countyInput.options[k].text = County[k];
                  if (County[k] == County[ i ]) {
                      countyInput.options[k].selected = true;
                  }
              }

              zoneInput.length = Zone[ i ].length;
              for (l = 0; l < zoneInput.length; l++) {
                  zoneInput.options[l].value = Zone[ i ][l];
                  zoneInput.options[l].text = Zone[ i ][l];
                  if (zoneInput.options[l].text == Zone[ i ][j]) {
                      zoneInput.options[l].selected = true;
                  }
              }
              return;
        }
    }
}
//     alert(k+'�L���l���ϸ�'+l);post=�R'ResetAll();return;
}

function showZone1(post){//�l���ϸ� �� �a�W
for (i=0; i < ZipCode.length; i++) {
    for (j=0; j < ZipCode[ i ].length; j++) {
        if ( post == ZipCode[ i ][j] ) {              
              document.write(County[ i ]+Zone[ i ][j]);return;
        }
    }
}
}
//==================== for zip code end =========================
-->