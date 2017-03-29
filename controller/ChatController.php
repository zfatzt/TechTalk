<?php
require '../repository/UserRepository.php';
require '../repository/ChatRepository.php';
class ChatController {
	public function chatErstellen() {
		$name = $_GET ["name"];
		$chat_id = $_GET ["chat_id"];
		$chat_id = intval ( $chat_id );
		$view = new View ( 'chat' );
		$view->title = $name . ' Chat';
		$view->heading = $name . ' Chat';
		$view->tablogin = true;
		if (isset ( $_SESSION ["benutzername"] )) {
			$view->username = $_SESSION ["benutzername"];
		}
		$view->kunde_id = $_SESSION ["id"];
		$view->name = $name;
		$view->chat_id = $chat_id;
		$userRepo = new UserRepository ();
		$alleUser = $userRepo->nutzerAuslesen ();
		$view->alleUser = $alleUser;
		$chatRepo = new ChatRepository ();
		$alleNachrichten = $chatRepo->textAuslesen ( $chat_id );
		$view->alleNachrichten = $alleNachrichten;
		$view->display ();
	}
	public function chatSenden() {
		if (isset ( $_POST ["nachrichtText"] ) && ! empty ( $_POST ["nachrichtText"] )) {
			$array = array (
					"4r5e",
					"5h1t",
					"5hit",
					"a55",
					"anal",
					"anus",
					"ar5e",
					"arrse",
					"arse",
					"ass",
					"ass-fucker",
					"asses",
					"assfucker",
					"assfukka",
					"asshole",
					"assholes",
					"asswhole",
					"a_s_s",
					"b!tch",
					"b00bs",
					"b17ch",
					"b1tch",
					"ballbag",
					"balls",
					"ballsack",
					"bastard",
					"beastial",
					"beastiality",
					"bellend",
					"bestial",
					"bestiality",
					"bi+ch",
					"biatch",
					"bitch",
					"bitcher",
					"bitchers",
					"bitches",
					"bitchin",
					"bitching",
					"bloody",
					"blow job",
					"blowjob",
					"blowjobs",
					"boiolas",
					"bollock",
					"bollok",
					"boner",
					"boob",
					"boobs",
					"booobs",
					"boooobs",
					"booooobs",
					"booooooobs",
					"breasts",
					"buceta",
					"bugger",
					"bum",
					"bunny fucker",
					"butt",
					"butthole",
					"buttmuch",
					"buttplug",
					"c0ck",
					"c0cksucker",
					"carpet muncher",
					"cawk",
					"chink",
					"cipa",
					"cl1t",
					"clit",
					"clitoris",
					"clits",
					"cnut",
					"cock",
					"cock-sucker",
					"cockface",
					"cockhead",
					"cockmunch",
					"cockmuncher",
					"cocks",
					"cocksuck",
					"cocksucked",
					"cocksucker",
					"cocksucking",
					"cocksucks",
					"cocksuka",
					"cocksukka",
					"cok",
					"cokmuncher",
					"coksucka",
					"coon",
					"cox",
					"crap",
					"cum",
					"cummer",
					"cumming",
					"cums",
					"cumshot",
					"cunilingus",
					"cunillingus",
					"cunnilingus",
					"cunt",
					"cuntlick",
					"cuntlicker",
					"cuntlicking",
					"cunts",
					"cyalis",
					"cyberfuc",
					"cyberfuck",
					"cyberfucked",
					"cyberfucker",
					"cyberfuckers",
					"cyberfucking",
					"d1ck",
					"damn",
					"dick",
					"dickhead",
					"dildo",
					"dildos",
					"dink",
					"dinks",
					"dirsa",
					"dlck",
					"dog-fucker",
					"doggin",
					"dogging",
					"donkeyribber",
					"doosh",
					"duche",
					"dyke",
					"ejaculate",
					"ejaculated",
					"ejaculates",
					"ejaculating",
					"ejaculatings",
					"ejaculation",
					"ejakulate",
					"f u c k",
					"f u c k e r",
					"f4nny",
					"fag",
					"fagging",
					"faggitt",
					"faggot",
					"faggs",
					"fagot",
					"fagots",
					"fags",
					"fanny",
					"fannyflaps",
					"fannyfucker",
					"fanyy",
					"fatass",
					"fcuk",
					"fcuker",
					"fcuking",
					"feck",
					"fecker",
					"felching",
					"fellate",
					"fellatio",
					"fingerfuck",
					"fingerfucked",
					"fingerfucker",
					"fingerfuckers",
					"fingerfucking",
					"fingerfucks",
					"fistfuck",
					"fistfucked",
					"fistfucker",
					"fistfuckers",
					"fistfucking",
					"fistfuckings",
					"fistfucks",
					"flange",
					"fook",
					"fooker",
					"fuck",
					"fucka",
					"fucked",
					"fucker",
					"fuckers",
					"fuckhead",
					"fuckheads",
					"fuckin",
					"fucking",
					"fuckings",
					"fuckingshitmotherfucker",
					"fuckme",
					"fucks",
					"fuckwhit",
					"fuckwit",
					"fudge packer",
					"fudgepacker",
					"fuk",
					"fuker",
					"fukker",
					"fukkin",
					"fuks",
					"fukwhit",
					"fukwit",
					"fux",
					"fux0r",
					"f_u_c_k",
					"gangbang",
					"gangbanged",
					"gangbangs",
					"gaylord",
					"gaysex",
					"goatse",
					"God",
					"god-dam",
					"god-damned",
					"goddamn",
					"goddamned",
					"hardcoresex",
					"hell",
					"heshe",
					"hoar",
					"hoare",
					"hoer",
					"homo",
					"hore",
					"horniest",
					"horny",
					"hotsex",
					"jack-off",
					"jackoff",
					"jap",
					"jerk-off",
					"jism",
					"jiz",
					"jizm",
					"jizz",
					"kawk",
					"knob",
					"knobead",
					"knobed",
					"knobend",
					"knobhead",
					"knobjocky",
					"knobjokey",
					"kock",
					"kondum",
					"kondums",
					"kum",
					"kummer",
					"kumming",
					"kums",
					"kunilingus",
					"l3i+ch",
					"l3itch",
					"labia",
					"lust",
					"lusting",
					"m0f0",
					"m0fo",
					"m45terbate",
					"ma5terb8",
					"ma5terbate",
					"masochist",
					"master-bate",
					"masterb8",
					"masterbat*",
					"masterbat3",
					"masterbate",
					"masterbation",
					"masterbations",
					"masturbate",
					"mo-fo",
					"mof0",
					"mofo",
					"mothafuck",
					"mothafucka",
					"mothafuckas",
					"mothafuckaz",
					"mothafucked",
					"mothafucker",
					"mothafuckers",
					"mothafuckin",
					"mothafucking",
					"mothafuckings",
					"mothafucks",
					"mother fucker",
					"motherfuck",
					"motherfucked",
					"motherfucker",
					"motherfuckers",
					"motherfuckin",
					"motherfucking",
					"motherfuckings",
					"motherfuckka",
					"motherfucks",
					"muff",
					"mutha",
					"muthafecker",
					"muthafuckker",
					"muther",
					"mutherfucker",
					"n1gga",
					"n1gger",
					"nazi",
					"nigg3r",
					"nigg4h",
					"nigga",
					"niggah",
					"niggas",
					"niggaz",
					"nigger",
					"niggers",
					"nob",
					"nob jokey",
					"nobhead",
					"nobjocky",
					"nobjokey",
					"numbnuts",
					"nutsack",
					"orgasim",
					"orgasims",
					"orgasm",
					"orgasms",
					"p0rn",
					"pawn",
					"pecker",
					"penis",
					"penisfucker",
					"phonesex",
					"phuck",
					"phuk",
					"phuked",
					"phuking",
					"phukked",
					"phukking",
					"phuks",
					"phuq",
					"pigfucker",
					"pimpis",
					"piss",
					"pissed",
					"pisser",
					"pissers",
					"pisses",
					"pissflaps",
					"pissin",
					"pissing",
					"pissoff",
					"poop",
					"porn",
					"porno",
					"pornography",
					"pornos",
					"prick",
					"pricks",
					"pron",
					"pube",
					"pusse",
					"pussi",
					"pussies",
					"pussy",
					"pussys",
					"rectum",
					"retard",
					"rimjaw",
					"rimming",
					"s hit",
					"s.o.b.",
					"sadist",
					"schlong",
					"screwing",
					"scroat",
					"scrote",
					"scrotum",
					"semen",
					"sex",
					"sh!+",
					"sh!t",
					"sh1t",
					"shag",
					"shagger",
					"shaggin",
					"shagging",
					"shemale",
					"shi+",
					"shit",
					"shitdick",
					"shite",
					"shited",
					"shitey",
					"shitfuck",
					"shitfull",
					"shithead",
					"shiting",
					"shitings",
					"shits",
					"shitted",
					"shitter",
					"shitters",
					"shitting",
					"shittings",
					"shitty",
					"skank",
					"slut",
					"sluts",
					"smegma",
					"smut",
					"snatch",
					"son-of-a-bitch",
					"spac",
					"spunk",
					"s_h_i_t",
					"t1tt1e5",
					"t1tties",
					"teets",
					"teez",
					"testical",
					"testicle",
					"tit",
					"titfuck",
					"tits",
					"titt",
					"tittie5",
					"tittiefucker",
					"titties",
					"tittyfuck",
					"tittywank",
					"titwank",
					"tosser",
					"turd",
					"tw4t",
					"twat",
					"twathead",
					"twatty",
					"twunt",
					"twunter",
					"v14gra",
					"v1gra",
					"vagina",
					"viagra",
					"vulva",
					"w00se",
					"wang",
					"wank",
					"wanker",
					"wanky",
					"whoar",
					"whore",
					"willies",
					"willy",
					"xrated",
					"xxx" 
			);
			if (in_array ( $_POST ["nachrichtText"], $array ) != false) {
				echo '<script>alert("Bitte keine Schimpfwörter!")</script>';
			} else {
				$view = new View ( 'chat' );
				$nachricht = $_POST ["nachrichtText"];
				$chatRepo = new ChatRepository ();
				$chat_id = $_GET ["chat_id"];
				$chat_id = intval ( $chat_id );
				$kunde_id = $_SESSION ["id"];
				$kunde_id = intval ( $kunde_id );
				$text_id = $chatRepo->textSpeichern ( $nachricht );
				$text_id = intval ( $text_id );
				$view->chat = $chatRepo->textZuordnen ( $text_id, $chat_id, $kunde_id );
				$name = $_GET ["name"];
			}
			$this->chatErstellen ();
		} else {
			$this->chatErstellen ();
		}
	}
}
?>