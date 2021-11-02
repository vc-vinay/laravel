<?php

namespace App\Constant;

/**
 * Class Constants
 * @package App\Constants
 */
class Constant
{
    /**
     * Boolean status code
     */
    public const STATUS_ZERO = 0;
    public const STATUS_ONE = 1;
    public const STATUS_TWO = 2;
    public const STATUS_TRUE = true;
    public const STATUS_FALSE = false;
    public const NULL = null;

    /**
     * Entity Status
     */
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_UNPUBLISHED = 'unpublished';
    public const INQUIRY_STATUS_ACTIVE = 'inquiry status active';
    public const INQUIRY_STATUS_INACTIVE = 'inquiry status inactive';
    public const STATUS_CREATE = 'create';
    public const STATUS_UPDATE = 'update';
    public const STATUS_DELETE = 'delete';
    public const STATUS_SEND_FOR_APPROVAL = 'send_for_approval';
    public const STATUS_ALL = 'all';

    /**
     * Typographical Symbols
     */
    public const BACK_SLASH = '\\';
    public const SLASH = '/';
    public const UNDERSCORE = '_';
    public const HYPHEN = '-';
    public const AT_SIGN = '@';

    /**
     * Image Upload Path
     */
    public const BLOG_IMAGE_UPLOAD_PATH = '/images/blogs/';
    public const COURSE_IMAGE_UPLOAD_PATH = '/images/course/';
    public const CATALOGUE_LOGO_UPLOAD_PATH = '/images/catalogue/logos/';

    /**
     * Activity log types
     */
    public const ACCOUNT_LOGIN_LOG_NAME = 'account-login';
    public const ACCOUNT_VERIFY_LOG_NAME = 'account-verified';
    /**
     * Activity log action
     */
    public const INSERT_LOG = 'insert';
    public const UPDATE_LOG = 'update';
    public const DELETE_LOG = 'delete';
    public const SEND_FOR_APPROVAL_LOG = 'send_for_approval';
}
