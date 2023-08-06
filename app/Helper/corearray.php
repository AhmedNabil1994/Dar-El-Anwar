<?php

//User Roles
function userRole($input = null)
{
    $output = [
        USER_ROLE_ADMIN => __('Admin'),
        USER_ROLE_INSTRUCTOR => __('Instructor'),
        USER_ROLE_STUDENT => __('Student')
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}


function statusAction($input = null)
{
    $output = [
        STATUS_PENDING => __('Pending'),
        STATUS_ACCEPTED => __('Accepted'),
        STATUS_REJECTED => __('Rejected'),
        STATUS_SUSPENDED => __('Suspended'),
        STATUS_DELETED => __('Deleted'),
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}


function statusWithdrawalStatus($input = null)
{
    $output = [
        WITHDRAWAL_STATUS_PENDING => __('Pending'),
        WITHDRAWAL_STATUS_COMPLETE => __('Accepted'),
        WITHDRAWAL_STATUS_REJECTED => __('Rejected'),
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function transactionTypeText($input = null)
{
    $output = [
        TRANSACTION_DEPOSIT => __('Deposit'),
        TRANSACTION_WITHDRAWAL => __('Withdrawal'),
        TRANSACTION_WITHDRAWAL_CANCEL => __('Withdrawal Cancel'),
        TRANSACTION_BUY => __('Buy'),
        TRANSACTION_SELL => __('Sell'),
        TRANSACTION_AFFILIATE => __('Affiliate'),
        TRANSACTION_REFUND => __('Refund'),
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }

}

function statusClass($input = null)
{
    $output = [
        STATUS_PENDING => 'bg-info-soft-varient',
        STATUS_ACCEPTED => 'active',
        STATUS_REJECTED => 'bg-red',
        STATUS_SUSPENDED => 'bg-yellow',
        STATUS_DELETED => 'bg-red',
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getUserType($input = null)
{
    $output = [
        USER_ROLE_ADMIN => 'Admin',
        USER_ROLE_INSTRUCTOR => 'Instructor',
        USER_ROLE_STUDENT => 'Student'
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getPaymentMethodName($input = null)
{
    $output = [
        PAYPAL => 'paypal',
        STRIPE => 'stripe',
        BANK => 'bank',
        MOLLIE => 'mollie',
        INSTAMOJO => 'instamojo',
        PAYSTAC => 'paystack',
        SSLCOMMERZ => 'sslcommerz',
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}
function getPaymentMethodId($input = null)
{
    $output = [
         'paypal' => PAYPAL,
         'stripe' => STRIPE,
         'bank' => BANK,
         'mollie' => MOLLIE,
         'instamojo' => INSTAMOJO,
         'paystack' => PAYSTAC,
         'sslcommerz' => SSLCOMMERZ,
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}



