#Symfony2 HelloSign Bundle

[![Build Status](https://travis-ci.org/Bukashk0zzz/HelloSignBundle.svg)](https://travis-ci.org/Bukashk0zzz/HelloSignBundle)

[![Code Coverage](https://scrutinizer-ci.com/g/Bukashk0zzz/HelloSignBundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Bukashk0zzz/HelloSignBundle/?branch=master)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Bukashk0zzz/HelloSignBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Bukashk0zzz/HelloSignBundle/?branch=master)

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
	new Bukashk0zzz\HelloSignBundle\HelloSignBundle(),
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
