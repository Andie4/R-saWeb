// page notre histoire
var position = 1;
var dots = document.querySelectorAll('.dots');

// Initialisation des points (dots)
ColorDots();

function DecaleGauche() {
    position = position + 1;
    if (position == 4) {
        retourDebut();
    } else {
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        ColorDots();
    }

}

function retourDebut() {
    position = 0;
    document.querySelector(".js-photos").style.transition = 'none';
    document.querySelector(".js-photos").style.left = position * -500 + 'px';
    setTimeout(function () {
        document.querySelector(".js-photos").style.transition = 'left 0.3s ease';
        DecaleGauche();
    }, 20);
}

function DecaleDroite() {
    position = position - 1;
    if (position == 0) {
        retourFin();
    } else {
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        ColorDots();
    }

}

function retourFin() {
    position = 4;
    document.querySelector(".js-photos").style.transition = 'none';
    document.querySelector(".js-photos").style.left = position * -500 + 'px';
    setTimeout(function () {
        document.querySelector(".js-photos").style.transition = 'left 0.3s ease';
        DecaleDroite();
    }, 20);
}

function ColorDots() {
    dots.forEach(function (element) {
        element.style.backgroundColor = '#000000';
    });
    dots[position - 1].style.backgroundColor = '#ffffff';
}

dots.forEach(function (element, index) {
    element.addEventListener('click', function () {
        console.log(index + 1);
        position = index + 1;
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        ColorDots();
    });

});

document.querySelector('.slideRight').addEventListener('click', function (event) {
    DecaleGauche();
});

document.querySelector('.slideLeft').addEventListener('click', function (event) {
    DecaleDroite();
});

  



// Effet parallax au scroll
window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let parallaxElements = document.querySelectorAll('.parallax1, .parallax2, .parallax3, .parallax4');

    parallaxElements.forEach(function (element) {
        let speed = element.getAttribute('data-speed');
        let xPos = scrollTop * speed / 10;
        if (element.classList.contains('parallax1') || element.classList.contains('parallax3')) {
            element.style.transform = `translateX(${xPos}px) translateY(${xPos / 2}px)`;
        } else {
            element.style.transform = `translateX(-${xPos}px) translateY(${-xPos / 2}px)`;
        }
    });

    let title = document.querySelector('.titreBanniere');
    let titleSpeed = 0.5;
    let titleYPos = scrollTop * titleSpeed;
    title.style.transform = `translateY(${titleYPos}px)`;
});





// Vérification que l'adresse couriel n'est pas temporaire
/// resaweb.js

// Liste des domaines de courriels temporaires
var tempEmailDomains = [
    "uooos.com", "doolk.com", "nthrw.com", "bbitq.com", "ckptr.com", 
    "alldrys.com", "moabuild.com", "moongit.com", "20minutemail.it", 
    "diolang.com", "aosod.com", "huleos.com", "sharklasers.com", 
    "guerrillamail.info", "grr.la", "guerrillamail.biz", "guerrillamail.com", 
    "guerrillamail.de", "guerrillamail.net", "guerrillamail.org", 
    "guerrillamailblock.com", "pokemail.net", "spam4.me", "musiccode.me", 
    "lyricspad.net", "citmo.net", "vusra.com", "gufum.com", "best-john-boats.com", 
    "pirolsnet.com", "trickyfucm.com", "entipat.com", "smartinbox.online", 
    "goonby.com", "plexfirm.com", "neixos.com", "10mail.org", "firste.ml", 
    "zeroe.ml", "dropmail.me", "vintomaper.com", "labworld.org", "fillallin.com", 
    "dockleafs.com", "mailsac.com", "mails.omvvim.edu.in", "onetimeusemail.com", 
    "midiharmonica.com", "fthcapital.com", "yopmail.com", "crazymailing.com", 
    "exbts.com", "wemel.site", "mybx.site", "emeil.top", "mywrld.top", "matra.top", 
    "memsg.site", "mybx.site", "emailnax.com", "emailbbox.pro", "inboxbear.com", 
    "getnada.com", "guysmail.com", "guysmail.com", "trashmail.fr", "trashmail.se", 
    "my10minutemail.com", "123mail.org", "126.com", "139.com", "150mail.com", 
    "150ml.com", "163.com", "16mail.com", "2-mail.com", "420blaze.it", "4email.net", 
    "50mail.com", "8chan.co", "aaathats3as.com", "airmail.cc", "airpost.net", 
    "allmail.net", "antichef.com", "antichef.net", "bestmail.us", "bluewin.ch", 
    "c2.hu", "cluemail.com", "cocaine.ninja", "cock.email", "cock.li", "cock.lu", 
    "cumallover.me", "dfgh.net", "dicksinhisan.us", "dicksinmyan.us", 
    "elitemail.org", "emailcorner.net", "emailengine.net", "emailengine.org", 
    "emailgroups.net", "emailplus.org", "emailuser.net", "eml.cc", "f-m.fm", 
    "fast-email.com", "fast-mail.org", "fastem.com", "fastemail.us", 
    "fastemailer.com", "fastest.cc", "fastimap.com", "fastmail.cn", 
    "fastmail.co.uk", "fastmail.com", "fastmail.com.au", "fastmail.es", 
    "fastmail.fm", "fastmail.im", "fastmail.in", "fastmail.jp", "fastmail.mx", 
    "fastmail.net", "fastmail.nl", "fastmail.se", "fastmail.to", "fastmail.tw", 
    "fastmail.uk", "fastmail.us", "fastmailbox.net", "fastmessaging.com", 
    "fea.st", "firemail.cc", "fmail.co.uk", "fmailbox.com", "fmgirl.com", 
    "fmguy.com", "freemail.hu", "ftml.net", "getbackinthe.kitchen", "gmx.com", 
    "gmx.us", "goat.si", "h-mail.us", "hailmail.net", "hitler.rocks", 
    "horsefucker.org", "hush.ai", "hush.com", "hushmail.com", "hushmail.me", 
    "imap-mail.com", "imap.cc", "imapmail.org", "inoutbox.com", 
    "internet-e-mail.com", "internet-mail.org", "internetemails.net", 
    "internetmailing.net", "jetemail.net", "justemail.net", "kakao.com", 
    "letterboxes.org", "liamekaens.com", "mail-central.com", "mail-page.com", 
    "mail2world.com", "mailandftp.com", "mailas.com", "mailbolt.com", "mailc.net", 
    "mailcan.com", "mailforce.net", "mailftp.com", "mailhaven.com", 
    "mailingaddress.org", "mailite.com", "mailmight.com", "mailnew.com", 
    "mailsent.net", "mailservice.ms", "mailup.net", "mailworks.org", 
    "memeware.net", "ml1.net", "mm.st", "mozmail.com", "myfastmail.com", 
    "mymacmail.com", "naver.com", "neverbox.com", "nigge.rs", "nospammail.net", 
    "nus.edu.sg", "onet.pl", "ownmail.net", "petml.com", "postinbox.com", 
    "postpro.net", "proinbox.com", "promessage.com", "qq.com", "realemail.net", 
    "reallyfast.biz", "reallyfast.info", "recursor.net", "redchan.it", "ruffrey.com", 
    "rushpost.com", "safe-mail.net", "sent.as", "sent.at", "sent.com", 
    "shitposting.agency", "shitware.nl", "sibmail.com", "sneakemail.com", 
    "snkmail.com", "snkml.com", "spamcannon.com", "spamcannon.net", 
    "spamgourmet.com", "spamgourmet.net", "spamgourmet.org", "speedpost.net", 
    "speedymail.org", "ssl-mail.com", "swift-mail.com", "tfwno.gf", 
    "the-fastest.net", "the-quickest.com", "theinternetemail.com", "tweakly.net", 
    "ubicloud.com", "veryfast.biz", "veryspeedy.net", "waifu.club", "warpmail.net", 
    "xoxy.net", "xsmail.com", "xwaretech.com", "xwaretech.info", 
    "xwaretech.net", "yahoo.com.ph", "yahoo.com.vn", "yeah.net", 
    "yepmail.net", "your-mail.com"
];

// Fonction de validation de l'email sie elle n'est pas temporaire
function validateEmail(domainOrEmail) {
    var domain = domainOrEmail.split('@').pop();
    return !tempEmailDomains.includes(domain);
}

document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('form1');

    form.addEventListener('submit', function(event) {
        var emailInput = document.getElementById('email');
        var emailAddress = emailInput.value.trim();

// Empêche l'envoi du formulaire si l'adresse e-mail est temporaire
        if (!validateEmail(emailAddress)) {
            alert("Veuillez utiliser une adresse e-mail permanente.");
            event.preventDefault(); 
        }
    });
});


