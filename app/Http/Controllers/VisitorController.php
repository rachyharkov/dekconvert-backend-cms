<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $fetch_seo_conf = SeoSetting::where('id', 1)->first();
        $data_seo = [
            'image_src' => $fetch_seo_conf->image_src,
            'meta_title' => $fetch_seo_conf->meta_title,
            'meta_description' => $fetch_seo_conf->meta_description,
            'meta_keywords' => $fetch_seo_conf->meta_keywords,
            'meta_author' => $fetch_seo_conf->meta_author,
            'meta_language' => $fetch_seo_conf->meta_language,
            'meta_revisit_after' => $fetch_seo_conf->meta_revisit_after,
            'meta_robots' => $fetch_seo_conf->meta_robots,
            'meta_googlebot' => $fetch_seo_conf->meta_googlebot,
            'meta_google_site_verification' => $fetch_seo_conf->meta_google_site_verification,
            'meta_google_analytics' => $fetch_seo_conf->meta_google_analytics,
            'meta_google_search_console' => $fetch_seo_conf->meta_google_search_console,
            'meta_bing_search_console' => $fetch_seo_conf->meta_bing_search_console,

            'shortcut_icon' => $fetch_seo_conf->shortcut_icon,
            'og_site_name' => $fetch_seo_conf->og_site_name,
            'og_title' => $fetch_seo_conf->og_title,
            'og_url' => $fetch_seo_conf->og_url,
            'og_type' => $fetch_seo_conf->og_type,
            'og_description' => $fetch_seo_conf->og_description,
            'og_image' => $fetch_seo_conf->og_image,

            'itemprop_name' => $fetch_seo_conf->itemprop_name,
            'itemprop_url' => $fetch_seo_conf->itemprop_url,
            'itemprop_description' => $fetch_seo_conf->itemprop_description,
            'itemprop_image' => $fetch_seo_conf->itemprop_image,
            'itemprop_thumbnail' => $fetch_seo_conf->itemprop_thumbnail,

            'twitter_title' => $fetch_seo_conf->twitter_title,
            'twitter_url' => $fetch_seo_conf->twitter_url,
            'twitter_image' => $fetch_seo_conf->twitter_image,
            'twitter_card' => $fetch_seo_conf->twitter_card,
            'twitter_description' => $fetch_seo_conf->twitter_description
        ];
        return view('welcome', compact('data_seo'));
    }
}
