<?php

/**
 * Description of Social
 *
 * @author CelsoPC
 */
class Social {

    private $_idsocial;
    private $_facebook;
    private $_twitter;
    private $_whatsapp;
    private $_youtube;
    private $_instagram;
    private $_google;
    private $_pinterest;

    function __construct() {
        $this->setAlConstruct(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAlConstruct($_idsocial, $_facebook, $_twitter, $_whatsapp, $_youtube, $_instagram, $_google, $_pinterest) {
        $this->_idsocial = $_idsocial;
        $this->_facebook = $_facebook;
        $this->_twitter = $_twitter;
        $this->_whatsapp = $_whatsapp;
        $this->_youtube = $_youtube;
        $this->_instagram = $_instagram;
        $this->_google = $_google;
        $this->_pinterest = $_pinterest;
    }

    function getIdsocial() {
        return $this->_idsocial;
    }

    function getFacebook() {
        return $this->_facebook;
    }

    function getTwitter() {
        return $this->_twitter;
    }

    function getWhatsapp() {
        return $this->_whatsapp;
    }

    function getYoutube() {
        return $this->_youtube;
    }

    function getInstagram() {
        return $this->_instagram;
    }

    function getGoogle() {
        return $this->_google;
    }

    function getPinterest() {
        return $this->_pinterest;
    }

    function setIdsocial($idsocial) {
        $this->_idsocial = $idsocial;
    }

    function setFacebook($facebook) {
        $this->_facebook = $facebook;
    }

    function setTwitter($twitter) {
        $this->_twitter = $twitter;
    }

    function setWhatsapp($whatsapp) {
        $this->_whatsapp = $whatsapp;
    }

    function setYoutube($youtube) {
        $this->_youtube = $youtube;
    }

    function setInstagram($instagram) {
        $this->_instagram = $instagram;
    }

    function setGoogle($google) {
        $this->_google = $google;
    }

    function setPinterest($pinterest) {
        $this->_pinterest = $pinterest;
    }

    public function __toString() {
        return "ID: " . $this->_idsocial
                . " | facebook: " . $this->_facebook
                . " | twitter: " . $this->_twitter
                . " | whatsapp: " . $this->_whatsapp
                . " | youtube: " . $this->_youtube
                . " | instagram: " . $this->_instagram
                . " | google: " . $this->_google
                . " | pinterest: " . $this->_pinterest
                . " \n";
    }

}
