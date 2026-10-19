<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Ipv6\Module;
use Vexura\Whmcs\Ipv6\Registrar;
use Vexura\Whmcs\Ipv6\Automation;

/** IPv6: WHMCS MetaData callback. */
function vexuraipv6_MetaData(): array
{
    return ['DisplayName' => 'Vexura · IPv6', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** IPv6: WHMCS ConfigOptions callback. */
function vexuraipv6_ConfigOptions(): array
{
    return Module::config('ipv6');
}

/** IPv6: WHMCS TestConnection callback. */
function vexuraipv6_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** IPv6: WHMCS ClientArea callback. */
function vexuraipv6_ClientArea(array $params): array
{
    return Module::clientArea('ipv6', $params);
}

/** IPv6: WHMCS AdminCustomButtonArray callback. */
function vexuraipv6_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** IPv6: WHMCS CreateAccount callback. */
function vexuraipv6_CreateAccount(array $params): string
{
    return Module::run('ipv6', 'create', $params);
}

/** IPv6: WHMCS RefreshStatus callback. */
function vexuraipv6_RefreshStatus(array $params): string
{
    return Module::run('ipv6', 'create', $params);
}

/** IPv6: WHMCS SyncPaidInvoices callback. */
function vexuraipv6_SyncPaidInvoices(array $params): string
{
    return Module::run('ipv6', 'sync', $params);
}

/** IPv6: WHMCS TerminateAccount callback. */
function vexuraipv6_TerminateAccount(array $params): string
{
    return Module::run('ipv6', 'terminate', $params);
}

/** IPv6: WHMCS SuspendAccount callback. */
function vexuraipv6_SuspendAccount(array $params): string
{
    return Module::run('ipv6', 'suspend', $params);
}

/** IPv6: WHMCS UnsuspendAccount callback. */
function vexuraipv6_UnsuspendAccount(array $params): string
{
    return Module::run('ipv6', 'unsuspend', $params);
}
