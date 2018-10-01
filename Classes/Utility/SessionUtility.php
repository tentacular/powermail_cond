<?php
namespace In2code\PowermailCond\Utility;

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Class SessionUtility
 */
class SessionUtility
{

    /**
     * Get quoted list from array
     *
     * @param array $array
     * @return void
     */
    public static function setSession(array $array)
    {
        $typoScriptFrontend = self::getTyposcriptFrontendController();
        $typoScriptFrontend->initFEuser();
	    $sessionData = $typoScriptFrontend->fe_user->getSessionData('tx_powermail_cond');
	    $sessionData = $sessionData ? $sessionData : array();
	    $formUid = $array['mail']['form'];
	    $sessionData[$formUid] = $array;
	    $typoScriptFrontend->fe_user->setAndSaveSessionData('tx_powermail_cond', $sessionData);
    }

    /**
     * @return TypoScriptFrontendController
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected static function getTyposcriptFrontendController()
    {
        return $GLOBALS['TSFE'];
    }
}
