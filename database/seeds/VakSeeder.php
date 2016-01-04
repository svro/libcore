<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Vak;

class VakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('vak')->truncate();

        $arr = array(
            array('vakcode' => 'TE','vaknaam' => 'Techniek'),
            array('vakcode' => 'HW','vaknaam' => 'Communicatiewetenschappen'),
            array('vakcode' => 'RE','vaknaam' => 'Remediering spelling 1'),
            array('vakcode' => 'KA','vaknaam' => 'Aanvulling wiskunde'),
            array('vakcode' => 'KC','vaknaam' => 'Beeldende creatieve vorming'),
            array('vakcode' => 'KI','vaknaam' => 'Italiaans'),
            array('vakcode' => 'KF','vaknaam' => 'Wijsgerige vraagstukken'),
            array('vakcode' => 'KN','vaknaam' => 'Informatica'),
            array('vakcode' => 'KW','vaknaam' => 'Verdieping wetenschappen'),
            array('vakcode' => 'KS','vaknaam' => 'Spaans'),
            array('vakcode' => 'KP','vaknaam' => 'Psychologie'),
            array('vakcode' => 'KE','vaknaam' => 'Keuzevak economie'),
            array('vakcode' => 'SK','vaknaam' => 'Seminarie Klassieke Culturele Vorming'),
            array('vakcode' => 'SH','vaknaam' => 'Seminarie Multiculturele vraagstukken'),
            array('vakcode' => 'ST','vaknaam' => 'Seminarie Talenproject'),
            array('vakcode' => 'SW','vaknaam' => 'Seminarie probleem oplossen in de exacte wetenschappen'),
            array('vakcode' => 'SM','vaknaam' => 'Seminarie probleem oplossen in de wiskunde'),
            array('vakcode' => 'SB','vaknaam' => 'Seminarie bedrijfseconomische casestudies'),
            array('vakcode' => 'WX','vaknaam' => 'Extensie wiskunde'),
            array('vakcode' => 'FI','vaknaam' => 'Filosofie'),
            array('vakcode' => 'CU','vaknaam' => 'Cultuur'),
            array('vakcode' => 'NA','vaknaam' => 'Natuurwetenschappen'),
            array('vakcode' => 'IC','vaknaam' => 'Internat. Communic.'),
            array('vakcode' => 'SI','vaknaam' => 'Sociaal econom. Initiatie'),
            array('vakcode' => 'KV','vaknaam' => 'Keuzevak'),
            array('vakcode' => 'SE','vaknaam' => 'Seminariewerk'),
            array('vakcode' => 'WE','vaknaam' => 'Natuurwetenschappen'),
            array('vakcode' => 'AT','vaknaam' => 'Algemeen totaal'),
            array('vakcode' => 'TO','vaknaam' => 'Technologische opvoeding'),
            array('vakcode' => 'IN','vaknaam' => 'Informatica'),
            array('vakcode' => 'AA','vaknaam' => 'Aardrijkskunde'),
            array('vakcode' => 'BI','vaknaam' => 'Biologie'),
            array('vakcode' => 'CH','vaknaam' => 'Chemie'),
            array('vakcode' => 'WW','vaknaam' => 'Wetenschappelijk werk'),
            array('vakcode' => 'FY','vaknaam' => 'Fysica'),
            array('vakcode' => 'WI','vaknaam' => 'Wiskunde'),
            array('vakcode' => 'GR','vaknaam' => 'Grieks'),
            array('vakcode' => 'LA','vaknaam' => 'Latijn'),
            array('vakcode' => 'DU','vaknaam' => 'Duits'),
            array('vakcode' => 'EN','vaknaam' => 'Engels'),
            array('vakcode' => 'FR','vaknaam' => 'Frans'),
            array('vakcode' => 'NE','vaknaam' => 'Nederlands'),
            array('vakcode' => 'ES','vaknaam' => 'Esthetica'),
            array('vakcode' => 'GW','vaknaam' => 'Gedragswetenschappen'),
            array('vakcode' => 'CW','vaknaam' => 'Cultuurwetenschappen'),
            array('vakcode' => 'EC','vaknaam' => 'Economie'),
            array('vakcode' => 'GE','vaknaam' => 'Geschiedenis'),
            array('vakcode' => 'GO','vaknaam' => 'Godsdienst'),
            array('vakcode' => 'MO','vaknaam' => 'Muzikale opvoeding'),
            array('vakcode' => 'PO','vaknaam' => 'Plastische opvoeding'),
            array('vakcode' => 'LO','vaknaam' => 'Lichamelijke opvoeding'),
            array('vakcode' => 'BC','vaknaam' => 'Beeldcommunicatie'),
            array('vakcode' => 'SU','vaknaam' => 'Seminarie Taaluitwisseling'),
            array('vakcode' => 'SS','vaknaam' => 'Seminarie sociologische casestudies'),
            array('vakcode' => 'KX','vaknaam' => 'Aanvulling wetenschappen'),
            array('vakcode' => 'KB','vaknaam' => 'Verdieping wiskunde'),
            array('vakcode' => 'KR','vaknaam' => 'Verbale creatieve vorming'),
            array('vakcode' => 'KT','vaknaam' => 'Esthetica "Leve de kunst"'),
            array('vakcode' => 'KG','vaknaam' => 'Actief met geluid'),
            array('vakcode' => 'KD','vaknaam' => 'Duits in themas'),
            array('vakcode' => 'CV','vaknaam' => 'Culturele Vorming'),
            array('vakcode' => 'MD','vaknaam' => 'Module')
        );

        $vakken = factory(Vak::class, count($arr))->create();
        for ($i = 0; $i < count($vakken);++$i) {
            $vakken[$i]["code"]=$arr[$i]["vakcode"];
            $vakken[$i]["naam"]=$arr[$i]["vaknaam"];
            $vakken[$i]->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        Model::reguard();
    }
}
