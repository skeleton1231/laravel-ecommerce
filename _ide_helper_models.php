<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $vendor_id
 * @property string $mobile
 * @property string $email
 * @property string $password
 * @property string $image
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\VendorsBankDetails|null $vendorBank
 * @property-read \App\Models\VendorsBusinessDetail|null $vendorBusiness
 * @property-read \App\Models\Vendor|null $vendorPersonal
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereVendorId($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $country_code
 * @property string $country_name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 */
	class Section extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vendor
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property string $mobile
 * @property string $email
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 */
	class Vendor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VendorsBankDetails
 *
 * @property int $id
 * @property int $vendor_id
 * @property string $account_holder_name
 * @property string $bank_name
 * @property string $account_number
 * @property string $bank_ifsc_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereAccountHolderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereBankIfscCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBankDetails whereVendorId($value)
 */
	class VendorsBankDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\VendorsBusinessDetail
 *
 * @property int $id
 * @property int $vendor_id
 * @property string $shop_name
 * @property string $shop_address
 * @property string $shop_city
 * @property string $shop_state
 * @property string $shop_country
 * @property string $shop_pincode
 * @property string $shop_mobile
 * @property string $shop_website
 * @property string $shop_email
 * @property string $address_proof
 * @property string $address_proof_image
 * @property string $business_license_number
 * @property string $gst_number
 * @property string $pan_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereAddressProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereAddressProofImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereBusinessLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereGstNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail wherePanNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopPincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereShopWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VendorsBusinessDetail whereVendorId($value)
 */
	class VendorsBusinessDetail extends \Eloquent {}
}

