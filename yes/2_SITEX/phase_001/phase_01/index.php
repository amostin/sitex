<?php
    include ('INC/custom.lib.php');
    $infos = getInfos("SITEX", "01");
    $param = array(
        'siteName' => 'Nom de site en param'
        ,'titleText' => 'Bienvenue'
        ,'mainContent' =>   '<header>
                                <h1>Bienvenue</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<div></p><div hidden> Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</div>
                            </header>
                            <section hidden>
                                <h2>article section h2</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><div hidden> Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</div>
                            </section>
                            <section hidden>
                                <h2>article section h2</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><div hidden> Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.</div>
                            </section>
                            <footer hidden>
                                <h3>article footer h3</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><div hidden> Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</div>
                            </footer>'
        ,'asideContent' =>'<h3>aside</h3>
                               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><div hidden> Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices.</div>'
        ,'footerSection' => footerContent($infos)
        ,'navContent' =>   '<ul>
                                <li><a href="#">accueil</a></li>
                                <li><a href="#">tp</a></li>
                                <li><a href="#">connexion</a></li>
                            </ul>'

    );
    include("INC/template.inc.php");
