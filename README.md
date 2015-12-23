#Symfony2/Symfony3 HelloSign Bundle

[![Build Status](https://img.shields.io/scrutinizer/build/g/Bukashk0zzz/HelloSignBundle.svg?style=flat-square)](https://travis-ci.org/Bukashk0zzz/HelloSignBundle)
[![Code Coverage](https://img.shields.io/codecov/c/github/Bukashk0zzz/HelloSignBundle.svg?style=flat-square)](https://codecov.io/github/Bukashk0zzz/HelloSignBundle)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/Bukashk0zzz/HelloSignBundle.svg?style=flat-square)](https://scrutinizer-ci.com/g/Bukashk0zzz/HelloSignBundle/?branch=master)
[![License](https://img.shields.io/packagist/l/Bukashk0zzz/hellosign-bundle.svg?style=flat-square)](https://packagist.org/packages/Bukashk0zzz/hellosign-bundle)
[![Latest Stable Version](https://img.shields.io/packagist/v/Bukashk0zzz/hellosign-bundle.svg?style=flat-square)](https://packagist.org/packages/Bukashk0zzz/hellosign-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/Bukashk0zzz/hellosign-bundle.svg?style=flat-square)](https://packagist.org/packages/Bukashk0zzz/hellosign-bundle)
[![Dependency Status](https://www.versioneye.com/user/projects/56780cf8107997002d00131d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56780cf8107997002d00131d)

[![knpbundles.com](http://knpbundles.com/Bukashk0zzz/HelloSignBundle/badge-short)](http://knpbundles.com/Bukashk0zzz/HelloSignBundle)

About
-----

This is just a wrapper for the [official SDK](https://github.com/HelloFax/hellosign-php-sdk) provided by [HelloSign](https://www.hellosign.com).

Installation
------------

Add this to your `composer.json` file:

```json
"require": {
	"bukashk0zzz/hellosign-bundle": "dev-master",
}
```


Add the bundle to `app/AppKernel.php`

```php
$bundles = array(
	// ... other bundles
	new Bukashk0zzz\HelloSignBundle\Bukashk0zzzHelloSignBundle(),
);
```

Configuration
-------------

Add this to your `config.yml`:

```yaml
bukashk0zzz_hello_sign:
    #(Required) email address or apikey or OAuthToken
    login: 'XXXXXXXX'
    #(Optional, default: null) Null if using apikey or OAuthToken
    password: 'ZZZ'
    #(Optional, default: https://api.hellosign.com/v3/) alternative api base url
    url: 'https://api.hellosign.com/v3/'
    #(Optional, default: https://www.hellosign.com/oauth/token) alternative oauth url
    oauth_url: 'https://www.hellosign.com/oauth/token'
```


Usage
-----

Provided services:

| Service             | Class                         |
|---------------------|-------------------------------|
| `hellosign.client`  | `\HelloSign\Client`           |


Inside a controller:

```php
class DocsController extends Controller
{
    public function createSignatureRequestAction()
    {
        $request = new HelloSign\TemplateSignatureRequest;
        $request->enableTestMode();
        $request->setTemplateId($template->getId());
        $request->setSubject('Purchase Order');
        $request->setMessage('Glad we could come to an agreement.');
        $request->setSigner('Client', 'george@example.com', 'George');
        $request->setCC('Accounting', 'accounting@example.com');
        $request->setCustomFieldValue('Cost', '$20,000');
        
        $response = $this->getContainer()->get('hellosign.client')->sendTemplateSignatureRequest($request);
    }
}
```

Copyright / License
-------------------

See [LICENSE](https://github.com/bukashk0zzz/HelloSignBundle/blob/master/LICENSE)
