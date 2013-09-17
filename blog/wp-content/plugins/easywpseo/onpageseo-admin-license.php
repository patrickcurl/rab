<?php
if (!function_exists ('is_admin'))
{
        header('Status: 403 Forbidden');
        header('HTTP/1.1 403 Forbidden');
        exit();
}
elseif (!class_exists('OnPageSEOLicense'))
{
        class OnPageSEOLicense
        {
                /**
                 * Instance Variables
                 */
                var $licenseURL = 'http://www.easywpseo.com/license/';
                var $checkTime = 43200; // seconds
                var $licenseOptionName;
                var $licenseError = 0;
                var $license = array();
                var $options;
                /**
                 * PHP 5 constructor
                 *
                 * @param       void
                 * @return      void
                 */
                function __construct(&$options)
                {
                        // Plugin Options
                        $this->options = &$options;
                        // Set License Option Name
                        $this->licenseOptionName = OPSEO_PREFIX.'_license_check';
                        // Validate License Email & Serial Number
                        if($this->validateEmailSerial())
                        {
                                // Check License
                                $this->lastLicenseCheck();
                        }
                }
                /**
                 * Make sure user has entered license email and serial number
                 *
                 * @param       void
                 * @return      bool
                 */
                function validateEmailSerial()
                {
                        if((!isset($this->options['license_email']) || (strlen(trim($this->options['license_email'])) == 0)) || (!isset($this->options['license_serial']) || (strlen(trim($this->options['license_serial'])) == 0)))
                        {
                                // No Email and/or Serial Number
                                $this->licenseError = 1;
                                return false;
                        }
                        else { return true; }
                }
                function lastLicenseCheck()
                {
                        // Get Options
                        $this->getOptions();
                        // Last Update Check
                        if( strtotime(date('Y-m-d H:i:s')) > (strtotime($this->license['last_checked']) + $this->checkTime) )
                        {
                                $this->getLicenseInfo();
                                // Update If No Errors
                                if(!$this->licenseError) { update_option($this->licenseOptionName, $this->license); }
                        }
                }
                function getOptions()
                {
                        // Last Update Check
                        $this->license = get_option($this->licenseOptionName);
                        // If User Changed License
                        $this->licenseChanged();
                        if(!$this->license)
                        {
                                // Get License Information
                                $this->getLicenseInfo();
                                if(!$this->licenseError)
                                {
                                        // Create New Option
                                        $this->license = array('last_checked'=>date('Y-m-d H:i:s'), 'license_type'=>$this->license['license_type'], 'trial_expiration'=>$this->license['trial_expiration'], 'registered'=>$this->license['registered'], 'status'=>$this->license['status'], 'upgrade_url'=>$this->license['upgrade_url'], 'upgrade_message'=>stripslashes($this->license['upgrade_message']));
                                        add_option($this->licenseOptionName, $this->license);
                                }
                        }
                }
                function getLicenseInfo()
                {
                        // Request License Info From External URL
                                $this->license['license_type'] = "developer";
                                return('license');
                        // Check If Trial License Has Expired
                        // NO Need :P
                        // Nulled By Kuasha420 @ blackhatteam.com :D 
                }
                
                function getLicenseName()
                {
                        switch($this->license['license_type'])
                        {
                                case 'free':
                                        return('Free');
                                        break;
                                case 'trial':
                                        return('Expiring Trial');
                                        break;
                                case 'single':
                                        return('Single Site');
                                        break;
                                case 'multi':
                                        return('Multi Site');
                                        break;
                                case 'developer':
                                        return('Developer');
                                        break;
                                case 'expired':
                                        return('Expired Trial');
                                        break;
                                default:
                                        return('');
                                        break;
                        }
                }
                function getLicenseUsage()
                {
                        switch($this->license['license_type'])
                        {
                                case 'free':
                                        return('You can use this on an unlimited number of sites that you own and also on your client\'s sites.');
                                        break;
                                case 'trial':
                                        return('Your license will expire '.$this->trialPeriodLeft().'.');
                                        break;
                                case 'single':
                                        return('You can use the plugin on one site.');
                                        break;
                                case 'multi':
                                        return('You can use the plugin on an unlimited number of sites that you own. (You cannot install the plugin on sites you do not personally own.)');
                                        break;
                                case 'developer':
                                        return('You can use the plugin on an unlimited number of sites that you own and also on your clients\' sites.');
                                        break;
                                case 'expired':
                                        return('Your trial has expired and you must upgrade to continue using the plugin.');
                                        break;
                                default:
                                        return('');
                                        break;
                        }
                }
                function trialPeriodLeft()
                {
                        $secondsLeft = strtotime($this->license['trial_expiration']) - strtotime(date('Y-m-d H:i:s'));
                        $timeLeft = (int)($secondsLeft / 86400);
                        if($timeLeft > 1) { return('in'.$timeLeft.' days'); }
                        elseif($timeLeft == 1) { return('in'.$timeLeft.' day'); }
                        else { return('today'); }
                }
                function licenseChanged()
                {
                        if( isset($this->options['old_license_email']) && (strlen(trim($this->options['old_license_email'])) > 0) && isset($this->options['old_license_serial']) && (strlen(trim($this->options['old_license_serial'])) > 0) && (($this->options['license_email'] != $this->options['old_license_email']) || ($this->options['license_serial'] != $this->options['old_license_serial'])) )
                        {
                                if(sizeof($this->license) > 0) { delete_option($this->licenseOptionName); $this->license = array(); }
                        }
                }
                function isLicenseError()
                {
                        return($this->licenseError);
                }
                function getUpgradeURL()
                {
                        return($this->license['upgrade_url'].'?email='.$this->options['license_email'].'&serial='.$this->options['license_serial']);
                }
                function getLicenseURL()
                {
                        return($this->licenseURL.'?email='.$this->options['license_email'].'&serial='.$this->options['license_serial']);
                }
                function getLicenseType()
                {
                        return($this->license['license_type']);
                }
                function getUpgradeMessage()
                {
                        return(stripslashes($this->license['upgrade_message']));
                }
        }
}
?>