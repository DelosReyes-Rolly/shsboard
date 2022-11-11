<?php

namespace Database\Seeders;

use App\Models\Announcements;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcements::create([
            'image' => '1664794906.jpg',
            'what' => 'Walang Pasok',
            'who' => 'Students and Teachers',
            'whn' => '2022-09-02',
            'whn_time' => '19:01:00',
            'whr' => 'SVNHS',
            'content' =>  '<p>𝐒𝐔𝐒𝐏𝐄𝐍𝐒𝐈𝐎𝐍 𝐎𝐅 𝐂𝐋𝐀𝐒𝐒𝐄𝐒 𝐈𝐍 𝐀𝐋𝐋 𝐋𝐄𝐕𝐄𝐋𝐒 (𝐏𝐔𝐁𝐋𝐈𝐂 𝐀𝐍𝐃 𝐏𝐑𝐈𝐕𝐀𝐓𝐄) 𝐈𝐍 𝐓𝐀𝐆𝐔𝐈𝐆 𝐂𝐈𝐓𝐘</p><p>&nbsp;</p><p>𝑆𝑒𝑝𝑡. 2, 2022</p><p>&nbsp;</p><p>Based on the guidelines released by the Department of Education thru DepEd Order No. 37 Series of 2022, CLASSES IN ALL LEVELS (PUBLIC AND PRIVATE) in Taguig City are AUTOMATICALLY SUSPENDED today, Sept. 2, 2022 due to the YELLOW WARNING issued by PAGASA.</p><p>&nbsp;</p><p>At 1:15PM, DOST PAGASA issued a heavy rainfall YELLOW warning over Metro Manila and adjacent provinces. The weather bureau warned of possible flooding in flood-prone areas.</p><p>&nbsp;</p><p>I Love Taguig</p><p></p>',
            'approval' => '2',
            'status' => '1',
            'privacy' => '1',
            'expired_at' => '2022-11-04',
        ]);
        Announcements::create([
            'image' => '1664794646.jpg',
            'what' => 'YES Roadshow',
            'who' => 'Students',
            'whn' => '2022-09-13',
            'whn_time' => '22:56:00',
            'whr' => 'Online Meeting (Zoom)',
            'content' => '<p>YES, we hear you!</p><p>&nbsp;</p><p>YES Virtual Roadshow is now open!</p><p>&nbsp;</p><p>Are you in 9th, 10th, or 11th grade?</p><p>&nbsp;</p><p>Have you ever thought of studying in the U.S.A?</p><p>&nbsp;</p><p>ARE YOU READY TO TAKE THE STEP?</p><p>&nbsp;</p><p>We bet you are! Join this Sunday on our Zoom Session: Kennedy-Lugar Youth Exchange and Study Program Virtual Roadshow for Batch 2023-2024. Meet our YES Alumni who will be helping you to your journey as a future YES scholar. As the application has officially started, we are giving this opportunity to walk you through the process and discuss what the program is all about.</p><p>&nbsp;</p><p>If you are a high school student, a parent of a high school student, or you have friends and classmates who are high school students, AFS IPP Metro Manila Community would love to present to you the 3rd annual YES Virtual Roadshow, happening on every Sunday of September, 1PM-3PM.&nbsp;</p><p>&nbsp;</p><p>Register through the google form</p><p>&nbsp;</p>',
            'status' => '1',
            'expired_at' => '2022-11-04',
            'is_event' => '1',
        ]);
        Announcements::create([
            'image' => '1664794502.jpg',
            'what' => 'Walang Pasok',
            'who' => 'Students and Teachers',
            'whn' => '2022-09-20',
            'whn_time' => '21:54:00',
            'whr' => 'SVNHS',
            'content' => '<p>WALANG PASOK ADVISORY (PM CLASS)</p><p>&nbsp;</p><p>source : IL Tgauig FB Page</p><p>&nbsp;</p><p><p>&nbsp;</p><p>Ano na? Suspended nanaman? Mga pang-umaga hindi na talaga nakakasabay. Waterproof yarn?</p><p>&nbsp;</p><p>Walang pasok check! Another point nanaman para sa mga pang hapon ang klase! Mahabang pahinga at oras para sa pag gawa ng mga take home tasks. Sa mga pang-umaga? Nadagdagan lang mga assignment.</p><p>&nbsp;</p><p>Pero syempre! Dahil maulan, kailangang magdoble ingat! Here&#39;s our five safety tips para mapanatiling ligtas tayo sa maulan na panahon!</p><p>&nbsp;</p><p>Stay safe ngayong maulan, Signalians! Magpahinga at gawin lahat ng mga takdang-aralin upang tuloy-tuloy ang pagiging productive!</p><p>&nbsp;</p><p>Pinagkuhanan:</p><p>Remate Online, &amp; Remate Online. (2018, September 10). ALAMIN: Safety tips kapag may bagyo - REMATE ONLINE. REMATE ONLINE. <a target="_blank" href="https://www.remate.ph/alamin-safety-tips-kapag-may-bagyo/">https://www.remate.ph/alamin-safety-tips-kapag-may-bagyo/</a></p>',
            'approval' => '2',
            'status' => '1',
            'privacy' => '1',
            'expired_at' => '2022-11-04 ',
        ]);
        Announcements::create([
            'image' => '1664794280.jpg',
            'what' => 'Walang pasok',
            'who' => 'Students and Teachers',
            'whn' => '2022-10-26',
            'whn_time' => '18:50:00',
            'whr' => 'SVNHS',
            'content' => '<p>&nbsp;</p><p>Good day, Signalians! Please be informed that tomorrow, September 26, 2022. Classes in all levels are suspended due to the intensified super typhoon Karding. The term super typhoon is used when a typhoon&#39;s sustained surface-wind strength reaches 240 km (150 miles) per hour, the equivalent of a strong category 4 or category 5 hurricane.</p><p>&nbsp;</p><p>As of the moment, Taguig City is on Signal Number 3. Here are some trivia and facts that we&#39;ve gathered about super typhoon and its thunderstorm signals and we also have 3 tips for you to stay safe during this kind of situation. Stay safe and stay at home Signalians!</p><p>&nbsp;</p>',
            'approval' => '2',
            'status' => '1',
            'privacy' => '1',
            'expired_at' => '2022-11-04',
        ]);
        Announcements::create([
            'image' => '1664794033.jpg',
            'what' => 'September Donut Conversation',
            'who' => 'Student',
            'whn' => '2022-10-01',
            'whn_time' => '12:45:00',
            'whr' => 'Online Meeting (Google meet)',
            'content' => '<p>&quot;Surrender will always feel like dying, and yet it is the necessary path to liberation. Surrender is not &quot;giving up&quot;, as we tend to think, nearly as much as it is &quot;giving to&quot; the moment, the event, the person, and the situation&quot; - Richard Rohr</p><p>&nbsp;</p><p>We must accept that there are people who are better than us and that there are things we still don&#39;t know in order to be able to better ourselves. To avoid feeling frightened by others when we realize that they are better than us, let&#39;s use their success as motivation to improve ourselves.</p><p>&nbsp;</p><p>We, the SSG Family, would like to express its sincere appreciation to <a href="https://www.facebook.com/GCICrosswayFellowship?__cft__[0]=AZVSQMScHsAvVQbHYbzVZegN7PDgZ-ZyEfR_uX5KKNBRJuZYFlcPWshzAYaTz7HgjWj5pua4mIaz8d9SjEQG6p-OH2AdtgSMb61-lZjdt-bBfcEh3qi6smyMV_z79HaFkbkD_JP36JLiGba5zaItbRiza8BT98kJpSD7xOvr4zMYnu5s-IzirlZNkTX0uWUsJKstaArqHB2_k9qLW2fzHrzH&amp;__tn__=-]K-R">GCI Crossway</a> and our speaker, Mr. Larry Parane, for passing along yet another piece of knowledge and a valuable lesson. Additionally, we would also like to thank all of the club and organization leaders that joined us for today&#39;s Donut Conversation.</p><p>&nbsp;</p><p>Photo with concent.</p>',
            'status' => '1',
            'expired_at' => '2022-11-04',
            'is_event' => '1',
        ]);
        Announcements::create([
            'image' => '1664793261.png',
            'what' => 'Teacher Month',
            'who' => 'Teachers',
            'whn' => '2022-09-05',
            'whn_time' => '12:00:00',
            'whr' => 'SVNHS',
            'content' => '<p>Signalians, it&#39;s that time of the year again. The most anticipated celebration for our dear teachers, Teachers&#39; Month!</p><p>After two years of commemorating Teachers&#39; Month online, we now have the opportunity to do it face to face for this year&#39;s celebration. Join us in celebrating our Teachers, for our Teachers&#39; Month Kickoff.</p><p>Let&#39;s recognize the Teachers who have shaped us and show our gratitude to them by honoring them for their efforts, patience and sacrifices for us. Teachers guide us in a firm yet gentle manner from the moment we step into our classrooms, away from our parents, until the time we graduate. When our parents cannot be there, it is the teacher who takes care of us. Our teachers, who have helped us become what we are today, plays such a big role in our lives.</p><p>To our dearest teachers, no number of thank you cards, flowers or presents can ever be enough to express our gratitude for the innumerable contributions of teachers in our lives. All the efforts and hard work you invested to bring out the best in us can never be repaid in mere words. We honor you today to recognize your virtues of altruism, devotion, hard work and wisdom in the classroom. We can only feel grateful for having such a great teachers like you!</p>',
            'status' => '1',
            'expired_at' => '2022-11-04',
            'is_event' => '1',
        ]);
    }
}
