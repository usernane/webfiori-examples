<?php
namespace webfiori\vueTheme;
use phpStructs\html\HeadNode;
use webfiori\entity\Page;
use webfiori\entity\Theme;
/**
 * A theme that uses Vue.js.
 *
 * @author Ibrahim
 */
class VueTheme extends Theme{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->setName('Vue Theme');
        $this->setVersion('1.0.0');
        $this->setAuthor('Ibrahim BinAlshikh');
        $this->setAuthorUrl('https://ibrahim-2017.blogspot.com');
        $this->setDescription('A theme which uses Vue.js Framework.');
        $this->setDirectoryName('vue');
    }
    public function createHTMLNode($options = array()) {
        
    }

    public function getAsideNode() {
        
    }

    public function getFooterNode() {
        
    }

    public function getHeadNode() {
        $hNode = new HeadNode();
        //Load Vue.js
        $hNode->addJs('https://cdn.jsdelivr.net/npm/vue');
        return $hNode;
    }

    public function getHeadrNode() {
        
    }

}
return __NAMESPACE__;
