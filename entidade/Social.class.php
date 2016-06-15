<?php

/**
 * Description of Social
 *
 * @author CelsoPC
 */
class Social {

    private $_idsocial;
    private $_instagram;
    private $_facebook;
    private $_google;
    private $_youtube;
    private $_pinterest;

    function __construct() {
        $this->setAlConstruct(NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAlConstruct($idsocial, $instagram, $facebook, $google, $youtube, $pinterest) {
        $this->_idsocial = $idsocial;
        $this->_instagram = $instagram;
        $this->_facebook = $facebook;
        $this->_google = $google;
        $this->_youtube = $youtube;
        $this->_pinterest = $pinterest;
    }

    function getIdsocial() {
        return $this->_idsocial;
    }

    function getInstagram() {
        return $this->_instagram;
    }

    function getFacebook() {
        return $this->_facebook;
    }

    function getGoogle() {
        return $this->_google;
    }

    function getYoutube() {
        return $this->_youtube;
    }

    function getPinterest() {
        return $this->_pinterest;
    }

    function setIdsocial($idsocial) {
        $this->_idsocial = $idsocial;
    }

    function setInstagram($instagram) {
        $this->_instagram = $instagram;
    }

    function setFacebook($facebook) {
        $this->_facebook = $facebook;
    }

    function setGoogle($google) {
        $this->_google = $google;
    }

    function setYoutube($youtube) {
        $this->_youtube = $youtube;
    }

    function setPinterest($pinterest) {
        $this->_pinterest = $pinterest;
    }

    public function __toString() {
        return "ID: " . $this->_idsocial
                . " | instagram: " . $this->_instagram
                . " | facebook: " . $this->_facebook
                . " | google: " . $this->_google
                . " | youtube: " . $this->_youtube
                . " | pinterest: " . $this->_pinterest
                . " \n";
    }

}
