<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe = Recipe::create([
            'title' => 'Omlete',
            'description' => 'Bļodā sakuļ četras olas (atkarībā no ēšanas paradumiem un ēdāju skaita) un pievieno garšvielas. Pievieno pienu, tā, lai masa iegūtu maigi dzeltenu toni un sajauc. Kad tas izdarīts, sagriež desu un sarīvē sieru. Paņem pannu un liek uz plīts, uz pašu karstāko režīmu. Uzlej olīvu vai rapšu eļļu (labākajā gadījumā rapšu vai saulespuķu) uz pannas. Pagaida, kad panna ir uzkarsusi, tad uz pannas lej bļodiņas saturu un pievieno desu. Cep, kad redzams, ka omlete ir zeltainā krāsā, pievieno sieru un cep, līdz siers ir izkusis, tad ņem pannu nost no plīts un liek omleti uz šķīvja.',
            'ingredients' => 'piens, olas, siers, desa (piena vai doktora desa), garšvielas',
            'photo' => 'uploads/XWtDsppsPxx3Pov0RFY4vIdkzVW5KwAlfyIQmWsv.jpg',
            'prepTime' => '25',
        ]);
        $recipe->categories()->sync([1,2]); // ievieto datus starptabulā
        $recipe = Recipe::create([
            'title' => 'Makaroni ar sieru',
            'description' => 'Liec visas sastāvdaļas traukā - jā, visas, izņemot sāli un piparus! Nevārīti radziņu makaroni, dārzeņi, piens, siers, ūdens un nedaudz miltu. Uzkarsē, līdz sāk burbuļot, pārsedz ar vāku un uz lēnas uguns karsē aptuveni 10 minūtes. Tad noņem katlam vai pannai vāku un karsē vēl 5 minūtes. Šajā brīdī makaroni būs uzvārījušies, dārzeņi kļuvuši maigi, siers - brīnišķīgi izkusis. Un tu pati būsi dažu mirkļu attālumā no krēmīgi dievīgiem makaroniem ar sieru un dažiem īpaši glītiem tomātiņiem un brokoļiem.',
            'ingredients' => 'makaroni, tomāti, piens, ūdens, siers, milti',
            'photo' => 'uploads/wuSzBcxKvOsKzif6lqfdu1McdEgCQg8KGZofDprg.jpg',
            'prepTime' => '20',
        ]);
        $recipe->categories()->sync([3,7]);
        $recipe = Recipe::create([
            'title' => 'Auzu pārslu putra',
            'description' => 'Katliņā uzvāra ūdeni, tad pielej pienu un pieber šķipsniņu sāls. Kad tas viss uzvārījies, ber klāt pārslas un aptuveni tējkaroti cukura. Tā kā man elektriskā plīts, pēc uzvārīšanās slēdzu ārā un uz sakarsušā riņķa atstāju sabriest. Reizi pa reizei apmaisot.',
            'ingredients' => 'piens, sāls, auzu pārslas, cukurs, ūdens',
            'photo' => 'uploads/zOS7E0E16bFjf6dzSfTZxRooX2SnI3C5zz93OmW9.jpg',
            'prepTime' => '20',
        ]);
        $recipe->categories()->sync([2,3,5,7]);
        $recipe = Recipe::create([
            'title' => 'Siera kūka',
            'description' => 'Sakarsē krāsni līdz 150 grādiem. Sagatavo veidni 24 cm diametrā, ietauko to ar sviestu un ieklāj cepamo papīru. Sasmalcina cepumus un pievieno tiem kausēto sviestu, kārtīgi samaisa un liek veidnē. Drumstalas izlīdzina un sapresē. Liek kūkas pamatni cepties 10 minūtes. Pa to laiku gatavo pildījumu. Olu baltumus atdala no dzeltenumiem. Lielā traukā saputo olas dzeltenumus ar cukuru, līdz masa kļūst gaiša. Pievieno krēmsieru, miltus un sāli. Turpina kult 2 minūtes. Mīklu maisa ar putojamo slotiņu un pakāpeniski pievieno pienu. Atsevišķā traukā saputo olu baltumus un uzmanīgi iecilā tos mīklā (svarīgi to nepārmaisīt!). Iegūto masu lej veidnē pāri cepumu kārtai un cep 50 minūtes. Gatavo kūku izņem no krāsns, veidnē atdzesē līdz istabas temperatūrai un tad ievieto ledusskapī uz pāris stundām vai uz nakti. Pirms pasniegšanas pārkaisa ar pūdercukuru.',
            'ingredients' => 'cepumi, sviests, olas, cukurs, krēmsiers, milti, sāls, piens',
            'photo' => 'uploads/n76gPPLy7SvzZc7sdDlc9C9dGYvueKzpn1qHzK9V.jpg',
            'prepTime' => '60',
        ]);
        $recipe->categories()->sync([1,5,4]);
        $recipe = Recipe::create([
            'title' => 'Ratatouille',
            'description' => 'Gatavo mērci. Smalki sagriež sīpolu, sarīvē ķiploku, nelielos gabaliņos sagriež burkānus, selerijas, paprikas, čili pipariņu. Sakarsē lielu pannu ar eļļu un sviestu, apcep sīpolus, līdz tie caurspīdīgi, tad pievieno burkānus, selerijas, paprikas un čili gabaliņus, visus cep, līdz dārzeņi kļūst viegli mīksti, apmēram 10 minūtes. Tad pievieno ķiploku un karsē vēl 1 minūti. Pēc tam pievieno konservētos tomātus, timiānu, sāli un piparus pēc garšas. Nogriež minimālu karstumu un sautē mērci 20 minūtes. Tikmēr liek karsēties cepeškrāsni uz 140ºC. Sagriež plānās šķēlēs ratatuja dārzeņus - cukīni, baklažānus un tomātus. Ēdiens būs īpaši glīts, ja izvēlētie dārzeņi, sagriezti šķēlēs, būs apmēram vienādā diametrā. Kad mērce gatava, to liek blenderī, pievieno bazilika lapiņas un sablendē vienmērīgu mērci. To liek dziļā cepešpannā, pa virsu pamīšus kārto ratatuja dārzeņu šķēles: baklažāns, cukīni zaļš, tomāts, cukīni dzeltens, baklažāns… Nelielā bļodiņā lej eļļu, kurā iejauc sarīvētu ķiploku un timiāna lapiņas. Dārzeņus apkaisa ar sāli un svaigi maltiem melnajiem pipariem, aplslacina ar sagatavoto olīveļļu. Pannu ar dārzeņiem apsedz ar foliju un liek siltā cepeškrāsnī un cep, līdz tie mīksti, apmēram 2 stundas. Pēc 2 - 2,5 stundām dārzeņiem noņem foliju, pagriež spēcīgāku uguni, paaugstinot temperatūru līdz 175ºC, un turpina cept apmēram 45 minūtes, līdz dārzeņi glīti karamelizējušies. Pasniedz.',
            'ingredients' => 'cukīni, baklažāni, tomāti, olīveļļa, ķiploki, sāls',
            'photo' => 'uploads/MQteV1g0qtLhAG8z1sWtqzR96mGLgGV0gpwUAHJL.jpg',
            'prepTime' => '240',
        ]);
        $recipe->categories()->sync([3,4]);
        $recipe = Recipe::create([
            'title' => 'Biešu zupa',
            'description' => 'Sīpolu sagriež un lielā pannā apcep sviestā, līdz viegli apbrūninās. Pievieno salmiņos sagrieztas bietes, līdzīgā garumā sagrieztus biešu kātus, mazākās un svaigākās biešu lapiņas. Uzliek pannai vāku un, pa laikam apmaisot, sautē 10 minūtes (Visas šīs sastāvdaļas varētu vārīt arī buljonā, bet sautējot bietes labāk saglabā krāsu un struktūru, kas šai zupai nav mazsvarīgi). Paralēli vāra gaļas (vai zupas veģetārā versijā dārzeņu) buljonu. Kad gaļa mīksta, to ar visu kaulu izņem no katla un buljonam pievieno palielos gabalos sagrieztus kartupeļus un biešu sautējumu. Zupu vāra, kamēr kartupeļi mīksti. Pievieno gabalos sagrieztu gaļu. Noņem no uguns un caur ķiploku spiedi piespiež ķiplokus. Ļauj ievilkties pāris minūtes, pasniedz ar krējumu un zaļumiem.',
            'ingredients' => 'bietes, sīpols, sviests, gaļa, kartupeļi, ūdens, sāls',
            'photo' => 'uploads/FfDdRNVPfIR65Pvrzo51SOEVg3i2RgqGtmWBnc1v.jpg',
            'prepTime' => '90',
        ]);
        $recipe->categories()->sync([3,4,6]);
        $recipe = Recipe::create([
            'title' => 'Cēzara salāti',
            'description' => 'Salātu lapas uzreiz saliek pa šķīvjiem vienādās porcijās, pieliek Cēzara salātu mērci vai vienkārši nedaudz majonēzes, tad saliek apkārt tomātu daiviņas un olu daiviņas (var izmantot ķiršu tomātus un paipalu oliņas, tad tos liek uz pusēm pārgrieztus). Padoms: veselīgākam rezultātam pagatavo mērci, sajaucot bezpiedevu jogurtu ar franču sinepēm, caur spiedi izspiestu ķiploka daiviņu un šļuciņu citronu sulas. Tad apcep pilienā olīveļļas kubiņus baltmaizes (var uzbērt persilādi ķiplociņu garšai). Grauzdiņus uzber uz salātiem. Tālāk cep vistas fileju, vidēji pietiek viena fileja uz diviem cilvēkiem. Fileju sagriež uz pusēm, apviļā vistas garšvielās un cep līdz kraukšķīgai garoziņai. Gatavo fileju liek pa virsu salātiem. Beigās pāri visam uzber smalki sarīvētu parmezāna sieru',
            'ingredients' => 'tomāti, olas, grauzdiņi, vistas fileja, garšvielas, siers',
            'photo' => 'uploads/6nDCXWewm1RsDRDoW6jMSCKPXsC7AiCcSRYmACLx.jpg',
            'prepTime' => '30',
        ]);
        $recipe->categories()->sync([1,2,3,4,7]);
    }
}
