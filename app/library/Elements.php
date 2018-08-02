
<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */


class Elements extends Component
{
    private $headerMenu = [
        'navbar-left' => [
            'users' => [
                'caption' => 'О проекте',
                'action' => 'about'
            ],
            'branch' => [
                'caption' => 'Контакты',
                'action' => 'contacts'
            ],
            'catalog' => [
                'caption' => 'Как забронировать',
                'action' => 'how-to-book'
            ],
            'delivery' => [
                'caption' => 'Условия использования',
                'action' => 'terms-of-use'
            ],
        ]
    ];

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $controllerName = $this->view->getControllerName();
        foreach ($this->headerMenu as $position => $menu) {


            echo '<nav class="nav header__nav">';
            echo '<ul class="nav-list">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="nav-list__item active">';
                } else {
                    echo '<li class="nav-list__item">';
                }
                $link ='/' . $option['action'];

                if (isset($option['params'])) {
                    $link .= '/' . $option['params'];
                }

                echo $this->tag->linkTo([$link.'/', $option['caption'] ,"class"=>"nav-list__link"]);
                echo '</li>';
            }
            echo '</ul></nav>';
        }
/*
        echo ' <div class="nav-collapse 2">';


if (isset($this->session->get('auth')['id'])) {

    echo '<ul class="nav navbar-nav navbar-right">
                <li>   <span class="top-header">'.$this->session->get('auth')['email'].'</span>'.$this->tag->form("authorization/logout/");
    echo '<input name="btn-send"  type="button"  style="width: 50px"  class="btn btn-primary-exit btn-xs"  value="Выйти" />';
    echo '</form></li> </ul>';

}
else {
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="/login/">Вход</a>';
    echo '</li> </ul>';
}



        echo '</div> <div class="clear"></div>';
*/

    }


}
