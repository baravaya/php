<?php

class Page
{
    public $content; //???????? ?????????? ????????
    public $title = 'TLA Consulting Pty Ltd'; //????????? ????? ????? ???????? ? ??????????? ?? ????????
    public $keywords = 'TLA Consulting, Three Letter Abbreviation';
    public $buttons = array ('Home' => 'home.php',
                             'Contact' => 'contact.php',
                             'Services' => 'services.php',
                              'Site map' => 'map.php'
        );
    //???????? ?????? Page
    public function  __set($name, $value)
    {
      $this->$name = $value;
    }
    public function Display()
    {
        echo "<html>\n<head>\n";
        $this -> DisplayTitle();
        $this -> DisplayKeywords();
        $this -> DisplayStyles();
        echo "<head>\n<body>\n";
        $this -> DisplayHeader();
        $this -> DisplayMenu($this -> buttons);
        echo $this -> content;
        $this -> DisplayFooter();
        echo "</body>\n</html>\n";
    }
    public function DisplayTitle()
    {
        echo '<title> '. $this->title.' <title>';
    }
    public function DisplayKeywords()
    {
        echo "<meta name=\"keywords\" content=\
        "".htmlentities($this->keywords). "\" /> ";
    }
    public function DisplayStyles()
    {
?>
    <style>
        </style>
<?php
    }

     public function DisplayHeader()
   {
?>
   <table width="100%" cellpadding="12" cellspacing="0" border="0">
       <tr bgcolor="black">
           <td align="left"><img src="logo.gif"></td>
       </tr>
   </table>
<?php
   }
    public function DisplayMenu($buttons)
    {
        echo "<table width='100%' bgcolor='white' cellpadding='4' cellspacing='4'>\n";
        echo "<tr>\n";
        //?????????? ???????? ??????
        $width = 100/count($buttons);
        while (list($name, $url)= each($buttons))
        {
            $this -> DisplayButton($width,$name, $url,
                                   !$this->IsURLCurrrentPage($url));
        }
        echo "</tr>\n";
        echo "</table>\n";
    }
    public function IsURLCurrrentPage($url)
    {
        if(strpos( $_SERVER['PATH_SELF'], $url) == false)
        {
          return false;
        }
        else
        {
            return true;
        }
    }
    public function DisplayButton($width,$name, $url, $active = true)
    {
        if($active)
        {
            echo "<td width='".htmlentities($width)."%'>
            <a href = '".htmlentities($url)."'>
            <img src = 's-logo.gif' alt = '".htmlentities($name)."' border = '0'/></a>
            <a href = '".htmlentities($url)."'><span class = 'menu'>$name</span></a></td>";
        }
        else
        {
            echo "<td width='".htmlentities($width)."%'>
            <img src = 'side-logo.gif'>
            <span class = 'menu'>$name</span></td>";
        }
    }
    public function DisplayFooter()
    {
?>
       <table width="100%" bgcolor="black" cellpadding="12" border="0">
           <tr>
               <td>
                   <p class="foot">&copy; TLA Consulting PTY Ltd.</p>
                   <p class="foot">Please, look page <a href="legal.php">with officiak information</a></p>
               </td>
           </tr>
       </table>
<?php
    }

}
?>