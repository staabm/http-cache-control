<?php

namespace staabm\HttpCacheControl;

/**
 * https://developers.cloudflare.com/cache/about/cache-control/#examples
 *
 * For a in-detail description of the used keywords see the Constants class.
 *
 * @see Constants
 */
final class UseCase {
    /**
     * Allows caching in all layers for $maxAge seconds.
     *
     * @param positive-int $maxAge
     */
    static public function staticAsset(int $maxAge = 86400):string {
        return 'public, max-age=' . $maxAge;
    }

    /**
     * no caching, anywhere.
     */
    static public function secretAsset():string {
        return 'no-store';
    }

    /**
     * Allows caching on browsers but not intermediate proxies/caches for $maxAge seconds.
     *
     * @param positive-int $maxAge
     */
    static public function cacheOnBrowserButNotProxy(int $maxAge) : string {
        return 'private, max-age=' . $maxAge;
    }

    /**
     * Cache assets in client and proxy caches, but PREFER revalidation when served
     */
    static public function cacheOnBrowserAndProxyPreferRevalidation() {
        return 'public, no-cache';
    }

    /**
     * Cache assets in client and proxy caches, but REQUIRE revalidation by PROXY cache when served
     */
    static public function cacheOnBrowserAndProxyRequireProxyRevalidation() : string {
        return 'public, no-cache, proxy-revalidate';
    }
    /**
     * Cache assets in client and proxy caches, but REQUIRE revalidation by any cache when served
     */
    static public function cacheOnBrowserAndProxyRequireAnyRevalidation() : string {
        return 'public, no-cache, must-revalidate';
    }

    /**
     * Cache assets in client and proxy caches, but disables transformation like gzip or brotli compression from our edge to your visitors if the original payload was served uncompressed.
     */
    static public function cacheOnBrowserAndProxyNoTransformation() : string {
        return 'public, no-transform';
    }

    /**
     * Cloudflare attempts to revalidate the content with the origin server after it has been in cache for $maxAge seconds.
     *
     * If the server returns an error instead of proper revalidation responses,
     * Cloudflare continues serving the stale resource for a total of $staleTimeout beyond the expiration of the resource.
     *
     * @param positive-int $maxAge
     * @param positive-int $staleTimeout
     */
    static public function cacheOnBrowserAndProxyAllowStaleResponse(int $maxAge, int $staleTimeout) : string {
        return 'public, max-age=' . $maxAge .', stale-if-error='. $staleTimeout;
    }

    /**
     *
     * @param positive-int $maxAge
     * @param positive-int $staleTimeout
     */
    static public function cacheOnBrowserAndProxyForDifferentTime(int $browserMaxAge, int $proxyMaxAge) : string {
        return 'public, max-age=' . $browserMaxAge .', s-maxage=' . $proxyMaxAge;
    }

    /**
     * This configuration indicates the asset is fresh for $freshTime seconds.
     *
     * The asset can be served stale for up to an additional $staleTimeout seconds
     * to parallel requests for the same resource while the initial synchronous revalidation is attempted.
     *
     * @param positive-int $freshTime
     * @param positive-int $staleTimeout
     */
    static public function cacheAndServeWhileRevalidation(int $freshTime, int $staleTimeout) : string {
        return 'max-age='. $freshTime .', stale-while-revalidate='. $staleTimeout;
    }
}