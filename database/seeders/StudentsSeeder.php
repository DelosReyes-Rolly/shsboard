<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //section A
        //Grade 11 - ABM
        // Students::create([
        //     'address_id' => '1',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885475477',
        //     'first_name' => 'Sarah',
        //     'middle_name' => 'Alves',
        //     'last_name' => 'Ribeiro',
        //     'gradelevel_id' => '1',
        //     'username' => 'SARibeiro',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'SarahAlvesRibeiro@rhyta.com',
        //     'phone_number' => '09353086466',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '2',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885614835',
        //     'first_name' => 'Laura',
        //     'middle_name' => 'Martins',
        //     'last_name' => 'Sousa',
        //     'gradelevel_id' => '1',
        //     'username' => 'LMSousa',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LauraMartinsSousa@armyspy.com',
        //     'phone_number' => '09281531579',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '3',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885359573',
        //     'first_name' => 'Argentino',
        //     'middle_name' => 'Franco',
        //     'last_name' => 'Cepada',
        //     'gradelevel_id' => '1',
        //     'username' => 'AFCepada',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ArgentinoFrancoCepeda@jourrapide.com',
        //     'phone_number' => '09410592955',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '4',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885219512',
        //     'first_name' => 'Gerald',
        //     'middle_name' => 'Galvez',
        //     'last_name' => 'Castillo',
        //     'gradelevel_id' => '1',
        //     'username' => 'GGCastillo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'GeraldGalvezCastillo@armyspy.com',
        //     'phone_number' => '09104656574',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - STEM

        // Students::create([
        //     'address_id' => '5',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885953740',
        //     'first_name' => 'Leonor',
        //     'middle_name' => 'Ribeiro',
        //     'last_name' => 'Costa',
        //     'gradelevel_id' => '1',
        //     'username' => 'LRCosta',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LeonorRibeiroCosta@teleworm.us',
        //     'phone_number' => '09654148437',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '6',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885615220',
        //     'first_name' => 'Felipe',
        //     'middle_name' => 'Julieta',
        //     'last_name' => 'Araujo',
        //     'gradelevel_id' => '1',
        //     'username' => 'FJAraujo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'JulietaFerreiraAraujo@dayrep.com',
        //     'phone_number' => '09786868750',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '7',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885634615',
        //     'first_name' => 'Randolfo',
        //     'middle_name' => 'Batista',
        //     'last_name' => 'Garcia',
        //     'gradelevel_id' => '1',
        //     'username' => 'RBGarcia',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'RandolfoBatistaGarcia@rhyta.com',
        //     'phone_number' => '09522029079',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '8',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885867045',
        //     'first_name' => 'Basillo',
        //     'middle_name' => 'Baez',
        //     'last_name' => 'Sevilla',
        //     'gradelevel_id' => '1',
        //     'username' => 'BBSevilla',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'BasilioBaezSevilla@dayrep.com',
        //     'phone_number' => '09326244113',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - HUMMS

        // Students::create([
        //     'address_id' => '9',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885673529',
        //     'first_name' => 'Luana',
        //     'middle_name' => 'Melo',
        //     'last_name' => 'Pereira',
        //     'gradelevel_id' => '1',
        //     'username' => 'LMPereira',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LuanaMeloPereira@jourrapide.com',
        //     'phone_number' => '09296027321',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '10',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885693724',
        //     'first_name' => 'Yasmin',
        //     'middle_name' => 'Melo',
        //     'last_name' => 'Fernandez',
        //     'gradelevel_id' => '1',
        //     'username' => 'YMFernandez',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'YasminMeloFernandes@dayrep.com',
        //     'phone_number' => '09189410625',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '11',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885201658',
        //     'first_name' => 'Argentino',
        //     'middle_name' => 'Solorio',
        //     'last_name' => 'Garza',
        //     'gradelevel_id' => '1',
        //     'username' => 'ASGarza',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ArgentinoSolorioGarza@rhyta.com',
        //     'phone_number' => '09906341530',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '12',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885580968',
        //     'first_name' => 'Gianfranco',
        //     'middle_name' => 'Lugo',
        //     'last_name' => 'Menchaca',
        //     'gradelevel_id' => '1',
        //     'username' => 'GLMenchaca',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'GianfrancoLugoMenchaca@armyspy.com',
        //     'phone_number' => '09949958032',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - GAS

        // Students::create([
        //     'address_id' => '13',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885580968',
        //     'first_name' => 'Nicole',
        //     'middle_name' => 'Fernandez',
        //     'last_name' => 'Sousa',
        //     'gradelevel_id' => '1',
        //     'username' => 'NFSousa',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'NicoleFernandesSousa@armyspy.com',
        //     'phone_number' => '09329918349',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '14',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885296607',
        //     'first_name' => 'Sophia',
        //     'middle_name' => 'Fernandez',
        //     'last_name' => 'Sousa',
        //     'gradelevel_id' => '1',
        //     'username' => 'SFSousa',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'SophiaFernandesSousa@rhyta.com',
        //     'phone_number' => '09773862964',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '15',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885898318',
        //     'first_name' => 'Ezer',
        //     'middle_name' => 'Ramos',
        //     'last_name' => 'Linares',
        //     'gradelevel_id' => '1',
        //     'username' => 'ERLinarez',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'EzerRamosLinares@jourrapide.com',
        //     'phone_number' => '09477218106',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '16',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885287666',
        //     'first_name' => 'Ammiel',
        //     'middle_name' => 'Velasquez',
        //     'last_name' => 'Loya',
        //     'gradelevel_id' => '1',
        //     'username' => 'AVLoya',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AmmielVelazquezLoya@jourrapide.com',
        //     'phone_number' => '09533975698',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - HE

        // Students::create([
        //     'address_id' => '17',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885307898',
        //     'first_name' => 'Halima',
        //     'middle_name' => 'Delgado',
        //     'last_name' => 'Loya',
        //     'gradelevel_id' => '1',
        //     'username' => 'HDLoya',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'halimadelgadovarela@rhyta.com',
        //     'phone_number' => '09622962463',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '18',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885650659',
        //     'first_name' => 'Jeannette',
        //     'middle_name' => 'Sisneros',
        //     'last_name' => 'Nieves',
        //     'gradelevel_id' => '1',
        //     'username' => 'JSNieves',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'JeanetteSisnerosNieves@rhyta.com',
        //     'phone_number' => '09235683852',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '19',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885532405',
        //     'first_name' => 'Kalil',
        //     'middle_name' => 'Luna',
        //     'last_name' => 'Barajas',
        //     'gradelevel_id' => '1',
        //     'username' => 'KLBarajas',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'KalilLunaBarajas@dayrep.com',
        //     'phone_number' => '09959908300',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '20',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885739956',
        //     'first_name' => 'Robertino',
        //     'middle_name' => 'Sanchez',
        //     'last_name' => 'Enriquez',
        //     'gradelevel_id' => '1',
        //     'username' => 'RSEnriquez',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'RobertinoSanchezEnriquez@dayrep.com',
        //     'phone_number' => '09187087334',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - ICT

        // Students::create([
        //     'address_id' => '21',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885670264',
        //     'first_name' => 'Martiana',
        //     'middle_name' => 'Montanez',
        //     'last_name' => 'Arroyo',
        //     'gradelevel_id' => '1',
        //     'username' => 'MMArroyo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'MartinianaMontanezArroyo@rhyta.com',
        //     'phone_number' => '09825119128',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '22',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885447906',
        //     'first_name' => 'Loretta',
        //     'middle_name' => 'Alfaro',
        //     'last_name' => 'Arce',
        //     'gradelevel_id' => '1',
        //     'username' => 'LAArce',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LorettaAlfaroArce@armyspy.com',
        //     'phone_number' => '09101021260',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '23',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885917549',
        //     'first_name' => 'Servio',
        //     'middle_name' => 'Valentin',
        //     'last_name' => 'Carillo',
        //     'gradelevel_id' => '1',
        //     'username' => 'SVCarillo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ServioValentinCarrillo@rhyta.com',
        //     'phone_number' => '09838975095',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '24',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885838011',
        //     'first_name' => 'Edelio',
        //     'middle_name' => 'Carrasquill',
        //     'last_name' => 'Cavazos',
        //     'gradelevel_id' => '1',
        //     'username' => 'ECCavazos',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'EdelioCarrasquillCavazos@rhyta.com',
        //     'phone_number' => '09735728104',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - Caregiving

        // Students::create([
        //     'address_id' => '25',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885280130',
        //     'first_name' => 'Heliana',
        //     'middle_name' => 'Parra',
        //     'last_name' => 'Vargaz',
        //     'gradelevel_id' => '1',
        //     'username' => 'HPVargaz',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'HelianaParraVargas@armyspy.com',
        //     'phone_number' => '09498589788',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '26',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885503783',
        //     'first_name' => 'Melitona',
        //     'middle_name' => 'Rangel',
        //     'last_name' => 'Tejeda',
        //     'gradelevel_id' => '1',
        //     'username' => 'MRTejeda',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'MelitonaRangelTejeda@armyspy.com',
        //     'phone_number' => '09408504156',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '27',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885399816',
        //     'first_name' => 'Junior',
        //     'middle_name' => 'Jaquez',
        //     'last_name' => 'Valvelarde',
        //     'gradelevel_id' => '1',
        //     'username' => 'JJValvelarde',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'JuniorJaquezValverde@jourrapide.com',
        //     'phone_number' => '09471506607',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '28',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885224026',
        //     'first_name' => 'Louis',
        //     'middle_name' => 'Echevarria',
        //     'last_name' => 'Ruelas',
        //     'gradelevel_id' => '1',
        //     'username' => 'LERuelas',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LouisEchevarriaRuelas@jourrapide.com',
        //     'phone_number' => '09102573759',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 11 - EIM

        // Students::create([
        //     'address_id' => '29',
        //     'course_id' => '8',
        //     'section_id' => '1',
        //     'LRN' => '136885742224',
        //     'first_name' => 'Are',
        //     'middle_name' => 'Reyna',
        //     'last_name' => 'Guardado',
        //     'gradelevel_id' => '1',
        //     'username' => 'ARGuardado',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AreReynaGuardado@rhyta.com',
        //     'phone_number' => '09358492266',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '30',
        //     'course_id' => '8',
        //     'section_id' => '1',
        //     'LRN' => '136885925336',
        //     'first_name' => 'Esperance',
        //     'middle_name' => 'Bareto',
        //     'last_name' => 'Comejo',
        //     'gradelevel_id' => '1',
        //     'username' => 'EBComejo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'EsperanceBarretoComejo@jourrapide.com',
        //     'phone_number' => '09349754315',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // //Grade 12 - ABM

        // Students::create([
        //     'address_id' => '31',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885460366',
        //     'first_name' => 'Elisa',
        //     'middle_name' => 'Gil',
        //     'last_name' => 'Tejada',
        //     'gradelevel_id' => '2',
        //     'username' => 'EGTejada',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ElisaGilTejada@armyspy.com',
        //     'phone_number' => '09120375202',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '32',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885543186',
        //     'first_name' => 'Selma',
        //     'middle_name' => 'Barraza',
        //     'last_name' => 'Arce',
        //     'gradelevel_id' => '2',
        //     'username' => 'SBArce',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'SelmaBarrazaArce@teleworm.us',
        //     'phone_number' => '09306643497',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '33',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885396959',
        //     'first_name' => 'Elio',
        //     'middle_name' => 'Monroy',
        //     'last_name' => 'Segovia',
        //     'gradelevel_id' => '2',
        //     'username' => 'EMSegovia',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ElioMonroySegovia@rhyta.com',
        //     'phone_number' => '09795197889',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '34',
        //     'course_id' => '1',
        //     'section_id' => '1',
        //     'LRN' => '136885679002',
        //     'first_name' => 'Dustin',
        //     'middle_name' => 'Ulibarri',
        //     'last_name' => 'Salcedo',
        //     'gradelevel_id' => '2',
        //     'username' => 'DUSalcedo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'DustinUlibarriSalcedo@teleworm.us',
        //     'phone_number' => '09465578393',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 12 - STEM

        // Students::create([
        //     'address_id' => '35',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885941128',
        //     'first_name' => 'Walkyria',
        //     'middle_name' => 'Alcantar',
        //     'last_name' => 'Gonzales',
        //     'gradelevel_id' => '2',
        //     'username' => 'WAGonzales',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'WalkyriaAlcantarGonzales@jourrapide.com',
        //     'phone_number' => '09328456604',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '36',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885860709',
        //     'first_name' => 'Ilva',
        //     'middle_name' => 'Trujillo',
        //     'last_name' => 'Nevarez',
        //     'gradelevel_id' => '2',
        //     'username' => 'IJNevarez',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'IlvaTrujilloNevarez@armyspy.com',
        //     'phone_number' => '09174571010',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '37',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885207013',
        //     'first_name' => 'Lucrecio',
        //     'middle_name' => 'Linares',
        //     'last_name' => 'Zepada',
        //     'gradelevel_id' => '2',
        //     'username' => 'LLZepada',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LucrecioLinaresZepeda@jourrapide.com',
        //     'phone_number' => '09762369790',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '38',
        //     'course_id' => '2',
        //     'section_id' => '1',
        //     'LRN' => '136885676875',
        //     'first_name' => 'Amaru',
        //     'middle_name' => 'Escamilla',
        //     'last_name' => 'Lugo',
        //     'gradelevel_id' => '2',
        //     'username' => 'AMLugo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AmaruEscamillaLugo@rhyta.com',
        //     'phone_number' => '09665334669',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 12 - HUMSS

        // Students::create([
        //     'address_id' => '39',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885856254',
        //     'first_name' => 'Orieta',
        //     'middle_name' => 'Cano',
        //     'last_name' => 'Carrasco',
        //     'gradelevel_id' => '2',
        //     'username' => 'OCCarrasco',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'OrietaCanoCarrasco@rhyta.com',
        //     'phone_number' => '09572376378',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '40',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885929863',
        //     'first_name' => 'Catherine',
        //     'middle_name' => 'Baca',
        //     'last_name' => 'Bernal',
        //     'gradelevel_id' => '2',
        //     'username' => 'CBBernal',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'catherinevacabernal@rhyta.com',
        //     'phone_number' => '09792108794',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '41',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885115422',
        //     'first_name' => 'Marcial',
        //     'middle_name' => 'Cordova',
        //     'last_name' => 'Guerra',
        //     'gradelevel_id' => '2',
        //     'username' => 'MCGuerra',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'MarcialCordovaGuerra@dayrep.com',
        //     'phone_number' => '09842472127',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '42',
        //     'course_id' => '3',
        //     'section_id' => '1',
        //     'LRN' => '136885503730',
        //     'first_name' => 'Antonino',
        //     'middle_name' => 'Pelayo',
        //     'last_name' => 'Abeyta',
        //     'gradelevel_id' => '2',
        //     'username' => 'APAbeyta',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AntoninoPelayoAbeyta@jourrapide.com',
        //     'phone_number' => '09632408681',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 12 - GAS

        // Students::create([
        //     'address_id' => '43',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885813497',
        //     'first_name' => 'Mariquena',
        //     'middle_name' => 'Toro',
        //     'last_name' => 'Mota',
        //     'gradelevel_id' => '2',
        //     'username' => 'MTMota',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'MariquenaToroMota@rhyta.com',
        //     'phone_number' => '09361245452',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '44',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885366839',
        //     'first_name' => 'Vitoria',
        //     'middle_name' => 'Cunha',
        //     'last_name' => 'Barbosa',
        //     'gradelevel_id' => '2',
        //     'username' => 'VCBarbosa',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'VitoriaCunhaBarbosa@dayrep.com',
        //     'phone_number' => '09519773077',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '45',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885970969',
        //     'first_name' => 'Bencio',
        //     'middle_name' => 'Mata',
        //     'last_name' => 'Cotto',
        //     'gradelevel_id' => '2',
        //     'username' => 'BMCotto',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'BenicioMataCotto@rhyta.com',
        //     'phone_number' => '09555118913',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '46',
        //     'course_id' => '4',
        //     'section_id' => '1',
        //     'LRN' => '136885194349',
        //     'first_name' => 'Victorino',
        //     'middle_name' => 'Sauceda',
        //     'last_name' => 'Valentin',
        //     'gradelevel_id' => '2',
        //     'username' => 'VSValentin',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'VictorinoSaucedaValentin@jourrapide.com',
        //     'phone_number' => '09103467448',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // // Grade 12 - HE

        // Students::create([
        //     'address_id' => '47',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885419199',
        //     'first_name' => 'Luana',
        //     'middle_name' => 'Gomez',
        //     'last_name' => 'Ribeiro',
        //     'gradelevel_id' => '2',
        //     'username' => 'LGRibeiro',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LuanaGomesRibeiro@teleworm.us',
        //     'phone_number' => '09479262736',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '48',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885585933',
        //     'first_name' => 'Alice',
        //     'middle_name' => 'Fernandez',
        //     'last_name' => 'Goncalves',
        //     'gradelevel_id' => '2',
        //     'username' => 'AFGoncalves',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AliceFernandesGoncalves@rhyta.com',
        //     'phone_number' => '09765181595',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '49',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885340833',
        //     'first_name' => 'Juvencio',
        //     'middle_name' => 'Ulibarri',
        //     'last_name' => 'Ibarra',
        //     'gradelevel_id' => '2',
        //     'username' => 'JUIbarra',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'JuvencioUlibarriIbarra@jourrapide.com',
        //     'phone_number' => '09600119902',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '50',
        //     'course_id' => '5',
        //     'section_id' => '1',
        //     'LRN' => '136885676509',
        //     'first_name' => 'Zenobio',
        //     'middle_name' => 'Porras',
        //     'last_name' => 'Zamudio',
        //     'gradelevel_id' => '2',
        //     'username' => 'ZPZamudio',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ZenobioPorrasZamudio@armyspy.com',
        //     'phone_number' => '09808184072',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 12 - ICT

        // Students::create([
        //     'address_id' => '51',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885583536',
        //     'first_name' => 'Isabela',
        //     'middle_name' => 'Pereira',
        //     'last_name' => 'Rocha',
        //     'gradelevel_id' => '2',
        //     'username' => 'IPRocha',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'IsabelaPereiraRocha@dayrep.com',
        //     'phone_number' => '09562863098',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '52',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885391674',
        //     'first_name' => 'Livia',
        //     'middle_name' => 'Santos',
        //     'last_name' => 'Castro',
        //     'gradelevel_id' => '2',
        //     'username' => 'LSCastro',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'LiviaSantosCastro@armyspy.com',
        //     'phone_number' => '09512364020',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '53',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885114100',
        //     'first_name' => 'Oliverio',
        //     'middle_name' => 'Rodriguez',
        //     'last_name' => 'Iglesias',
        //     'gradelevel_id' => '2',
        //     'username' => 'ORIglesias',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'OliverioRodriguezIglesias@rhyta.com',
        //     'phone_number' => '09196281532',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '54',
        //     'course_id' => '6',
        //     'section_id' => '1',
        //     'LRN' => '136885600958',
        //     'first_name' => 'Nicasio',
        //     'middle_name' => 'Tijerina',
        //     'last_name' => 'Crespo',
        //     'gradelevel_id' => '2',
        //     'username' => 'NTCrespo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'NicasioTijerinaCrespo@rhyta.com',
        //     'phone_number' => '09961790388',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 12 - Caregiving

        // Students::create([
        //     'address_id' => '55',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885594397',
        //     'first_name' => 'Amanda',
        //     'middle_name' => 'Sousa',
        //     'last_name' => 'Pinto',
        //     'gradelevel_id' => '2',
        //     'username' => 'ASPinto',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AmandaSousaPinto@rhyta.com',
        //     'phone_number' => '09788027079',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '56',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885670799',
        //     'first_name' => 'Alice',
        //     'middle_name' => 'Martins',
        //     'last_name' => 'Costa',
        //     'gradelevel_id' => '2',
        //     'username' => 'AMCosta',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AliceMartinsCosta@armyspy.com',
        //     'phone_number' => '09540057941',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '57',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885255903',
        //     'first_name' => 'Anolfo',
        //     'middle_name' => 'Baca',
        //     'last_name' => 'Crespo',
        //     'gradelevel_id' => '2',
        //     'username' => 'ABCrespo',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'AnolfoBacaCrespo@teleworm.us',
        //     'phone_number' => '09758744421',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '58',
        //     'course_id' => '7',
        //     'section_id' => '1',
        //     'LRN' => '136885319242',
        //     'first_name' => 'Brandon',
        //     'middle_name' => 'Aleman',
        //     'last_name' => 'Garica',
        //     'gradelevel_id' => '2',
        //     'username' => 'BAGarica',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'BrandonAlemanGarica@armyspy.com',
        //     'phone_number' => '09942420071',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // //Grade 12 - EIM

        // Students::create([
        //     'address_id' => '59',
        //     'course_id' => '8',
        //     'section_id' => '1',
        //     'LRN' => '136885553051',
        //     'first_name' => 'Julia',
        //     'middle_name' => 'Oliviera',
        //     'last_name' => 'Alves',
        //     'gradelevel_id' => '2',
        //     'username' => 'JOAlves',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'JuliaOliveiraAlves@teleworm.us',
        //     'phone_number' => '09510499014',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '60',
        //     'course_id' => '8',
        //     'section_id' => '1',
        //     'LRN' => '136885334403',
        //     'first_name' => 'Emily',
        //     'middle_name' => 'Araujo',
        //     'last_name' => 'Barros',
        //     'gradelevel_id' => '2',
        //     'username' => 'EABarros',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'EmillyAraujoBarros@armyspy.com',
        //     'phone_number' => '09618152681',
        //     'gender' => 'Female',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '61',
        //     'course_id' => '8',
        //     'section_id' => '1',
        //     'LRN' => '136885695657',
        //     'first_name' => 'Harold',
        //     'middle_name' => 'Arrendondo',
        //     'last_name' => 'Briseno',
        //     'gradelevel_id' => '2',
        //     'username' => 'HABrisbeno',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'HaroldArredondoBriseno@jourrapide.com',
        //     'phone_number' => '09943616322',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
        // Students::create([
        //     'address_id' => '62',
        //     'course_id' => '8',
        //     'section_id' => '1',
        //     'LRN' => '136885236072',
        //     'first_name' => 'Claus',
        //     'middle_name' => 'Nieves',
        //     'last_name' => 'Gamboa',
        //     'gradelevel_id' => '2',
        //     'username' => 'CNGamboa',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email' => 'ClausNievesGamboa@teleworm.us',
        //     'phone_number' => '09264397023',
        //     'gender' => 'Male',
        //     'status' => '1'
        // ]);
    }
}
