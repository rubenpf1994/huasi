<?php
class SessionController extends Controller{
    private $userSession;
    private $userName;
    private $userid;

    private $session;
    private $sites;

    private $user;

    function __construct()
    {
        parent::__construct();
        $this->init();
    }

    function init(){
        $this->session = new Session();
        /*
        $json = $this->getJSONFileConfig();

        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];
        */
        $this->validateSession();
    }

    public function validateSession(){
        error_log('SESSIONCONTROLLER::validateSession');

        if($this->existsSession()){
            $role = $this->getUserSessionData()->getRole();

            if($this->isPublic()){
                $this->redirectDefaultSiteByRole($role);
            }else{
                if($this->isAuthorized($role)){
    
                }else{
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        }else{
            //Si no existe seesion
            if($this->isPublic()){
                //Lo deja entrar
            }else{
                header('Location: '.constant('URL').'');
            }
        }
    }

    function isPublic(){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for($i=0; $i<sizeof($this->sites); $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access']=='public'){
                return true;
            }
        }
        return false;
    }

    function getCurrentPage(){
        $actualLink = trim($_SERVER['REQUEST_URI']);
        $url = explode('/', $actualLink);
        error_log('SESSIONCONTROLLER::getCurrentPage ->'.$url[2]);
        return $url[2];
    }
    function getUserSessionData(){
        $id = $this->userid;
        $this->user = new User();
        $this->user->get($id);
        error_log('SESSIONCONTROLLER::getUserSessionData -> '.$this->user->getId());
        return $this->user;
    }

    function existsSession(){
        if(!$this->session->exists())return false;
        if(!$this->session->getCurrentUser()==NULL)return false;

        $userid = $this->session->getCurrentUser();
        if($userid)return true;
        return false;
    }
    private function getJSONFileConfig(){
        $string = file_get_contents('config/access.json');
        $json = json_decode($string, true);

        return $json;
    }

    private function redirectDefaultSiteByRole($role){
        $url ='';
        for($i=0; $i<sizeof($this->sites); $i++){
            if($this->sites[$i]['role']==$role){
                $url = '/'.$this->sites[$i]['site'];
                break;
            }
        }
        header('Location:'.$url);
    }

    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for($i=0; $i<sizeof($this->sites); $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['role']==$role){
                return true;
            }
        }
        return false;
    }

    function initialize($user){
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }

    function authorizeAccess($role){
        switch($role){
            case 'user':
                $this->redirect($this->defaultSites['user'], []);
            break;
            case 'admin':  
                $this->redirect($this->defaultSites['admin'], []);
            break;  
        }
    }

    function logout(){
        $this->session->closeSession();
    }
}
?>