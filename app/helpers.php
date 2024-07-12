<?php
if (! function_exists('socialMediaShareLinks')) {

    function socialMediaShareLinks(string $path, string $provider)
    {
        switch ($provider) {
            case 'facebook':
                $share_link = 'https://www.facebook.com/sharer/sharer.php?u='.$path;
                break;
            case 'twitter':
                $share_link = 'https://twitter.com/intent/tweet?text='.$path;
                break;
            case 'pinterest':
                $share_link = 'http://pinterest.com/pin/create/button/?url='.$path;
                break;
            case 'linkedin':
                $share_link = 'https://www.linkedin.com/shareArticle?mini=true&url='.$path;
                break;
            case 'telegram':
                $share_link = 'https://t.me/share/url?url='.$path;
                break;
            case 'whatsapp':
                $share_link = 'https://api.whatsapp.com/send?text='.$path;
                break;
            case 'linkedin':
                $share_link = 'https://www.linkedin.com/sharing/share-offsite/?url='.$path;
                break;
            case 'mail':
                $share_link = 'mailto:?subject=Share this link&body='.$path;
                break;
            case 'skype':
                $share_link = 'https://web.skype.com/share?url='.$path;
                break;
        }

        return $share_link;
    }


}
