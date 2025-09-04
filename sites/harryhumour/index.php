 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        # /PAGE SETUP
        ?>
        <title>Harry Humour's Homepage</title>
        <link rel="stylesheet" href="style.css">
        <style> 
        @font-face {
            font-family: vinivicious;
            src: url('src/font/vinivicious.ttf');
        }
        body {
            margin:auto;
            padding:0;
            text-align:center;
            background: #3299cc;
            width:800px;
            font-family: vinivicious;
        }
        p {
            margin:0;
        }
        #freejoke {
            padding:15px;
            /* background:red; */
        }
        #presidentialpardon {
            padding:15px;
            position:relative;
            background:lightblue;
        }
        #president {
            border: ridge 5px gray;
        }
        #freejokes {
            padding:15px;
        }
        #othersites {
            padding:15px;
            /* background:green; */
        }
        table {
            width:400px;
            display:inline;
        }
        td {
            border: ridge 5px black;
            padding:5px;
            max-width:200px;
        }
        #buydvd {
            padding:15px 0;
            background:url("src/img/bg-brick.png");
            position:relative;
            color:white;
        }
        #buydvd table {
            position:relative;
            z-index:2;
        }
        #stage {
            background: url("src/img/bg-wood.png");
            background-repeat: repeat;
            height:75px;
            width:100%;
            bottom:0;
            position:absolute;
            z-index: 1;
        }
        #calltoaction{ 
            padding:15px;
            background:pink;
        }
        #calltoaction p {
            width:600px;
            border: ridge 5px black;
            padding:10px;
            margin:auto;
        }
        #inmemoriam {
            padding:10px;
        }
        #fungle {
            border: ridge 5px black;
        }
        #emailme {
            padding:15px;
            background:lightblue;
        }
        #jester {
            background:white;
            border: solid 4px blue;
            display:inline-block;
        }
        #joke {
            line-height:25px;
            color:blue;
            font-size:17px;
            margin: 30px;
        }
        hr {
            display: none;
        }
        </style>
    </head>
    <body>
        <div id="introduction">
            <h1>Welcome to the groovy cyber realm of Harry Humour, the net's funniest clean comedian</h1>
        </div>
        <!-- <div id="jester">
            <img src="src/img/jester.gif">
        </div> -->
        
        <div id="freejoke">
            <div id="joke">
            <p style="text-align:left"><u>Welcome to Laugh City!</u></p>
            <img src="src/img/anlthouse.gif">
            <img src="src/img/Button_House.gif">
            <img src="src/img/27.gif" style="width:50px;">
            <img src="src/img/mushroom_house_md_wht.gif">
            <img src="src/img/carmove.gif" style="width:50px;">
            <img src="src/img/anihouse.gif">
            <img src="src/img/house.gif">
            <img src="src/img/valhousewithsmokehearts.gif">
            <img src="src/img/swordfight.gif" style="width:50px;">
            <p style="text-align:right;">Population: YOU!</p>
             <p style="text-align:right;">Visitors: 23</p>
            </div>
           
            <hr>
            <p>Here's a free joke. Its on the house!</p>
            <br>
            <p style="position:relative;z-index:2">"I tried to catch some fog yesterday. I mist!"</p>
            <img style="position:relative;margin-top:-40px; z-index:0;" src="src/img/house02.gif">
            <h3>Welcome to my website!</h3>
            <p>Welcome to Harry Humour's domain of delight. I've been a purveyor of the priceless art of positivity for over 50 pears.. i mean years!!! Come join me and revel in the clean comedic stylings of... ME!!!! Some of my best work is featured right here on Virtual Dream. Thanks for stopping by my humble home on this internet. Stay goofy!<br>:~P<p>
        </div>
        <div id="notanapology">
            <h3>A note on Rankfield Show 26/02/08</h3>
            <p>My new lawyer has advised me that vicious, jackanape, so-called "reporters" think they can take down the king. My show at the Rankfield Comedy Club was flawless, yet these jackals want to shut down clean christian comedy FOR GOOD! I say NO! NO to foul vultures of society, NO! Begone from me, cretinous bugs. I have survived for this long off of blood, sweet and tears to bring my talents to society. Far too long to be shut down by misguided puppets of the world media. Call me "old-fashioned", call me "out of touch", but I make no apology for the things I say in my shows. It's COMEDY. It's JOKES. It's not my fault nobody taught the kid how to take a joke. Comedy, even clean (which need I remind you I PIONEERED) is meant to challenge society and make people uncomfortable. Comedians are the last bastion of free speech in this country. If we weren't here to speak truth to power, then GOOD LUCK on your own.  will be suing Rankfield, any anybody else that even thinks to challenge me on this. </p>
        </div>
        <div id="fired">
            <h3>Statemenmt on Lawyers</h3>
            <p>Representatives of Harry Humour, AKA HIMSELF, would like to state that his jackal lawyers have been FIRED.</p>
        </div>
        <div id="noteonbanktownincident">
            <h3> Statement on Banktown incident 16/09/07</h3>
            <p>Representatives of Harry Gore, AKA Harry Humour, would like to state that Harry has described the incident at Banktown Lounge on September 16th, 2007 as "regrettable" and "misguided". No further comments are made at this time, and Harry will not be reachable for question.</p>
        </div>
        <div id="freejokes">
            <h2><b>Free Jokes!</b></h2>
            <p id="joke"><u>Why don't skeletons fight each other?</u><br>They don't have the guts... or the muscles... or the skin. Okay, maybe they just don't have the spine for it!</p>
            <hr>
            <p id="joke"><u>I told my wife she should embrace her mistakes.</u><br>She gave me a hug. Turns out, she misunderstood me. Now we're stuck together like Velcro!</p>
            <hr>
            <p id="joke"><u>Why did the scarecrow win an award?</u><br>Because he was outstanding in his field! Though he's a bit stiff when it comes to acceptance speeches.</p>
            <hr>
            <img src="src/img/babylaugh.gif">
            <hr>
            <p id="joke"><u>I told my computer I needed a break.</u><br>Now it won't stop sending me vacation ads. Guess it's trying to give me some byte-sized advice!</p>
            <hr>
            <p id="joke"><u>I accidentally swallowed some food coloring yesterday.</u><br>The doctor says I'm okay, but I feel like I've dyed a little inside.</p>
            <hr>
            <p id="joke"><u>I used to play piano by ear.</u><br>Then I realized it was easier to use my fingers.</p>
            <hr>
            <p id="joke"><u>I told my friend I had a great joke about construction,</u><br>but I'm still working on it. Guess you could say I'm building up to it!</p>
            <hr>
            
        </div>
        <div id="buydvd">
            <img src="src/img/TV.gif"><img src="src/img/dvd.gif"><img src="src/img/TV.gif">
            <p>Missed Harry Humour LIVE? Wish you could watch it again? Never fear, for technology is here!</p>
            <p style="background: red; padding:10px; border-radius:10px; border: dashed 1px white;position:relative;z-index:2;margin:10px;"><img src="src/img/caution.gif" style="width:20px;">Note from Harry: Hi! Thanks for looking at my DVDs. Currently I'm out of stock since my computer went on the fritz which makes it hard to burn any more copies. Working hard to get this up and running again for my loyal fans! Party on!</p>
            <table>
                <tbody>
                    <tr>
                        <td>Harry Humour Heats Up Mildew City Comedy Club<br><img src="src/img/dvd.gif"><br>SOLD OUT</td>
                        <td>Harry Humour LIVE - Cleaning Up The Streets... HUMOUR STYLE<br><img src="src/img/dvd.gif"><br>SOLD OUT</td>
                        <td>The Best of Harry Humour - 190 Minutes of his BEST Material<br><img src="src/img/dvd.gif"><br>SOLD OUT</td>
                        <td>Harry Humour LIVE at Bone City Theatre<br><img src="src/img/dvd.gif"><br>SOLD OUT</td>
                    </tr>
                </tbody>
            </table>
            <div id="stage"></div>
            <img src="src/img/microphone.png" style="position:absolute;left:50px;bottom:25px;z-index:1;">
            <img src="src/img/stool.png" style="position:absolute;width:100px;left:150px;bottom:25px;z-index:1;">
        </div>
        <div id="calltoaction">
            <h2>A call to action from Harry Humour!</h2>
            <p>Hey there, fellow jokesters. It's your pal here, Harry Humour. Now I've been in the joke industry for a lot longer than I'm willing to admit, but lately, I've been feeling a bit bummed out about the state of comedy, and I have just got to get something off my chest. I've only said this twice in my life, folks, but lets get serious for a moment.
            <br>
            <br>
            You see, it seems like everywhere I look these days, comedy has taken a nosedive into the gutter. Feels like wherever you look dirty jokes, crude humor, and innuendos are all the rage, leaving us clean comedians by the wayside. And let me tell ya, the wayside is just not a fun place to be.
            <br>
            <br>
            It's like we've lost sight of what real comedy is all about: purity.
            <br>
            <br>
            That's why I'm calling on all you fine folks out there to join me in <u>VOTING for Ronald Schmonger for a 7th term as President of our free nation!</u> There's only one man who is going to clean up this rabble, and bring back the humour we used to love. Ronald's got the wit, the charm, and the impeccable taste in clean jokes that our country needs right now. He's been fighting for us, and he's only going to fight more! For change!
            <br>
            <br>
            Folks, let me tell you something. Ronald isn't just a politician; he's a force of nature, a whirlwind of change sweeping across our great nation. Ronald's vision for our country is bold, it's audacious, it's... well, it's something else, let me tell you. He's got plans, big plans, to make our country one again. And let me tell you, it's about time, after what that previous bunch did to this glorious nation.
            <br>
            <br>
            There's plenty of fools that don't understand, and they're exactly the kind of scum that's tearing this country apart at its core. They question his stance in medicine prices, but its glorious companies like MedaPharmGlobulite that keep this country running! When he promised to strap his presidential opponents to a rocket, they didn't believe him for a second! Look how that turned out for O'Brien! If that's not integrity, I don't know what is, and if you can't take a joke, take a hike instead! We don't need you!
            <br>
            <br>
            Together, let's keep the laughs coming, one squeaky-clean joke at a time!
            <br>
            <br>
            Remember, stay goofy,
            <br>
            Harry Humour
            </p>
            <img src="src/img/vote.gif">
        </div>
        <div id="presidentialpardon">
            <img src="src/img/toysoldier_drumming_md_wht.gif"><img src="src/img/movingwhitehouse.gif"><img src="src/img/presidentmid.png" id="president"><img src="src/img/movingwhitehouse.gif"><img src="src/img/toysoldier_drumming_md_wht.gif">
            <img src="src/img/halo.png" style="position:absolute;width:60px;left:48.5%;top:10px;">
            <img src="src/img/cloud.png" style="position:absolute;left:40%;top:10px;">
            <img src="src/img/cloud.png" style="position:absolute;left:55%;top:10px;">
            <p>"I hereby pardon Harry Humour for his funny jokes and use my presidential power to say he is the funniest guy on the internet!"</p>
            <p>- President Schmonger</p>
        </div>
        <div id="othersites">
            <p>Try out some of my other comedy sites!</p>
            <img src="src/img/pointright.gif">
            <table>
                <tbody>
                    <tr>
                        <td><a href="https://snailmail.virtualdream.live">Snail Mail<br><img src="src/img/snailmail.gif"></a></td>
                        <td>Coming soon!</td>
                    </tr>
                </tbody>
            </table>
            <img src="src/img/pointleft.gif">
            <p>Or check out some of our new Virtual Dream sponsors!</p>
            <div class="advertisement-banner"></div>
            <p style="background: red; padding:10px; border-radius:10px; border: dashed 1px white;"><img src="src/img/Caution.gif" style="width:20px;">WEBMASTER's NOTE: I have no control over what appears on the above banner. If the above banner is un-Christian in manner there is nothing I can do about it.</p>
        </div>
        <div id="emailme">
            <h1>I've got mail!</h1>
            <a href="mailto:harryhumour@virtualdream.live"><img src="src/img/mail6.gif"><img src="src/img/mailbox1.gif"><img src="src/img/mail.gif"></a>
            <p><a href="mailto:harryhumour@virtualdream.live">harryhumour@virtualdream.live</a></p>
        </div>
        <div id="inmemoriam">
            <img src="src/img/redposey.gif">
            <h2>In Memoriam: Fungle the Clown</h2>
            <img src="src/img/tombstone_lg_clr.gif">
            <img src="src/img/fungle.png" id="fungle">
            <img src="src/img/tombstone_lg_clr.gif">
            <p><i>"In the quiet depths of memory, absence echoes."</i></p>
        </div>
    </body> 
</html>