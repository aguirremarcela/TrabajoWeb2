<?php
    require_once ('libs/Smarty.class.php');  
    class InsurancesView{

        public function showInsurances($seguros){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->display('header.tpl');
            echo'<ul>';
            foreach($seguros as $seguro){
                
                $id=$seguro->id_categoria;

            echo'<li><a type="submit" href="seePlansCategory/'.$id.'">'. $seguro->categoria.'</a></li>';
            }
            echo '</ul>
                </body>
            </html>';
        }
        public function showPlans($planes){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->display('header.tpl');
            echo'<ul>';

            foreach($planes as $plane){

                $id=$plane->id_planes;

                echo '<li><a type="submit" href="showCoverage/'.$id.'">'. $plane->plan.'</a></li>';
            }
            echo '</ul>
            </body>
            </html>';
        }
        public function showCoverange($coveranges){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->display('header.tpl');
        echo'<ul><table>';

            foreach($coveranges as $coverange){
        
            echo' <tr><td>'.$coverange->cobertura.'</td><td>'.$coverange->descripcion.'</td></tr>';

            }
            echo '</table></ul>
            </body>
            </html>';
        }
}