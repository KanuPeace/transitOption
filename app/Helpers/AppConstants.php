<?php


namespace App\Helpers;

use App\Traits\Constants;

class AppConstants
{

    use Constants;

    const SERVER_ERR_CODE = 500;
    const BAD_REQ_ERR_CODE = 400;
    const AUTH_ERR_CODE = 401;
    const VALIDATION_ERR_CODE = 406;
    const GOOD_REQ_CODE = 200;
    const DEFAULT_USER_TYPE = 0; // represents "user"
    const ADMIN_USER_TYPE = 5;// represents "Admin"
    const COMPANY_USER_TYPE = 1;// represents "Company"
    const AUTH_TOKEN_EXP = 60; // auth otp token expiry in minutes
    const OTP_DEFAULT_LENGTH = 7;
    const MAX_PROFILE_PIC_SIZE = 2048;

    const PROFILE_COMPLETE = 1;
    const PROFILE_PENDING = 0;
    const PROFILE_INCOMPLETE = 2;
    const PROFILE_SUSPENDED = 3;

    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHERS = 'Others';

    const PAGINATION_VAL = 20;

    const PENDING_TRANSACTION = 0;
    const SUCCESSFUL_TRANSACTION = 1;
    const FAILED_TRANSACTION = 2;
    const CANCELLED_TRANSACTION = 3;
    const GG_PROVIDER = 'google';
    const FB_PROVIDER = 'facebook';

    const PAGINATION_SIZE_WEB = 50;

}
