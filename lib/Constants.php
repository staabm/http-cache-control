<?php

namespace staabm\HttpCacheControl;

/**
 * @see https://developers.cloudflare.com/cache/about/cdn-cache-control/
 */
final class Constants
{
    /**
     * regular cache-control header, read by browsers and proxies.
     */
    const CACHE_CONTROL = 'Cache-Control';
    /**
     * response header field set on the origin to separately
     * control the behavior of CDN caches from other intermediaries that might handle a response
     */
    const CACHE_CONTROL_CDN = 'CDN-Cache-Control';
    /**
     * results in the same behavior as the origin returning CDN-Cache-Control except Cloudflare does not
     * proxy Cloudflare-CDN-Cache-Control downstream because it’s a header only used to control Cloudflare.
     *
     * This option is beneficial if you want only Cloudflare to have a different caching behavior
     * while all other downstream servers rely on Cache-Control
     * or if you do not want Cloudflare to proxy the CDN-Cache-Control header downstream.
     */
    const CACHE_CONTROL_CLOUDFLARE = 'Cloudflare-CDN-Cache-Control';

    /**
     * Indicates any cache may store the response,
     * even if the response is normally non-cacheable or cacheable only within a private cache.
     */
    const CACHEBILITY_PUBLIC = 'public';
    /**
     * Indicates the response message is intended for a single user (e.g. a browser cache)
     * and must not be stored by a shared cache like Cloudflare or a corporate proxy.
     */
    const CACHEBILITY_PRIVATE = 'private';
    /**
     * Indicates any cache (i.e., a client or proxy cache) must not store any part of either the immediate request or response.
     */
    const CACHEBILITY_NO_STORE = 'no-store';

    /**
     * max-age=seconds — Indicates the response is stale after its age is greater than the specified number of seconds.
     *
     * Age is defined as the time in seconds since the asset was served from the origin server.
     * The seconds argument is an unquoted integer.
     */
    const EXPIRATION_MAX_AGE = 'max-age';
    /**
     * s-maxage=seconds — Indicates that in shared caches,
     * the maximum age specified by this directive overrides the maximum age specified by either the max-age directive or the Expires header field.
     *
     * The s-maxage directive also implies the semantics of the proxy-revalidate response directive. Browsers ignore s-maxage.
     */
    const EXPIRATION_SMAX_AGE = 's-max-age';
    /**
     * no-cache — Indicates the response cannot be used to satisfy a subsequent request without successful validation on the origin server.
     *
     * This allows an origin server to prevent a cache from using the origin to satisfy a request without contacting it,
     * even by caches that have been configured to send stale responses.
     */
    const EXPIRATION_NO_CACHE = 'no-cache';

    /**
     * Indicates that once the resource is stale, a cache (client or proxy)
     * must not use the response to satisfy subsequent requests without successful validation on the origin server.
     */
    const REVALIDATION_MUST_REVALIDATE = 'must-revalidate';
    /**
     * Has the same meaning as the must-revalidate response directive except that it does not apply to private client caches.
     */
    const REVALIDATION_PROXY_REVALIDATE = 'proxy-revalidate';
    /**
     * stale-while-revalidate=seconds — When present in an HTTP response, indicates caches may serve the response in
     * which it appears after it becomes stale, up to the indicated number of seconds since the resource expired.
     */
    const REVALIDATION_STALE_WHILE_REVALIDATE = 'stale-while-revalidate';
    /**
     * stale-if-error=seconds — Indicates that when an error is encountered,
     * a cached stale response may be used to satisfy the request, regardless of other freshness information.
     */
    const REVALIDATION_STALE_IF_ERROR = 'stale-if-error';

    /**
     * Indicates that an intermediary — regardless of whether it implements a cache — must not transform the payload
     */
    const OTHER_NO_TRANSFORM = 'no-transform';
    /**
     * Cloudflare does not consider vary values in caching decisions.
     */
    const OTHER_VARY = 'vary';
    /**
     * Indicates to clients the response body does not change over time.
     *
     * The resource, if unexpired, is unchanged on the server.
     * The user should not send a conditional revalidation for it (e.g., If-None-Match or If-Modified-Since) to check for updates,
     * even when the user explicitly refreshes the page.
     *
     * This directive has no effect on public caches like Cloudflare, but does change browser behavior.
     */
    const OTHER_IMMUTABLE = 'immutable';
}