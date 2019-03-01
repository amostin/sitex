<?php
/**
 * Created by PhpStorm.
 * User: Moi
 * Date: 09/02/2019
 * Time: 23:08
 */

include("INC/custom.lib.php");

$infos = getInfos("SITEX", 00);

$param = array(   "titleText"=> $infos['shortName']
    ,"mainContent" => "<header>
                        <h1>Bienvenue</h1>
                        <p LANG=\"fr\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </header>
                    <section hidden>
                        <h2>article section h2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
                    </section>
                    <section hidden>
                        <h2>article section h2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</p>
                    </section>
                    <footer hidden>
                        <h3>article footer h3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</p>
                    </footer>"
    ,"asideContent"=> "                    <h3>aside</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>"
    ,"footerSection"=> footerContent($infos)
    ,"navContent"=> "                    <ul>
                        <li><a href=\"#\">accueil</a></li>
                        <li><a href=\"#\">tp</a></li>
                        <li><a href=\"#\">connexion</a></li>
                    </ul>"

);

include("INC/template.inc.php");




// echo monPrint_r($infos);

