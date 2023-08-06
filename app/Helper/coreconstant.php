<?php


// User Role Type
const USER_ROLE_ADMIN = 1;
const USER_ROLE_INSTRUCTOR = 2;
const USER_ROLE_STUDENT = 3;



// Status
const STATUS_PENDING = 0;
const STATUS_ACCEPTED = 1;
const STATUS_SUCCESS = 1;
const STATUS_APPROVED = 1;
const STATUS_REJECTED = 2;
const STATUS_SUSPENDED = 4;
const STATUS_DELETED = 5;

// withdrawal Status
const WITHDRAWAL_STATUS_PENDING = 0;
const WITHDRAWAL_STATUS_COMPLETE = 1;
const WITHDRAWAL_STATUS_REJECTED = 2;


// Status
const AFFILIATE_REQUEST_PENDING = 2;
const AFFILIATE_REQUEST_REJECTED = 3;
const AFFILIATOR = 1;
const NOT_AFFILIATOR = 0;

const AFFILIATE_HISTORY_STATUS_PAID = 1;
const AFFILIATE_HISTORY_STATUS_DUE = 0;

// Transaction type
const TRANSACTION_DEPOSIT = 1;
const TRANSACTION_WITHDRAWAL = 2;
const TRANSACTION_BUY = 3;
const TRANSACTION_SELL = 4;
const TRANSACTION_AFFILIATE = 5;
const TRANSACTION_WITHDRAWAL_CANCEL = 6;
const TRANSACTION_REFUND = 7;

// narration
const DEPOSIT_NARRATION = '';
const WITHDRAWAL_NARRATION = '';
const BUY_NARRATION = '';
const SELL_NARRATION = '';
const AFFILIATE_NARRATION = 'Earning via affiliate';

//Order

const ORDER_PAYMENT_STATUS_PAID = 'paid';
const ORDER_PAYMENT_STATUS_DUE = 'due';
const ORDER_PAYMENT_STATUS_FREE = 'free';
const ORDER_PAYMENT_STATUS_PENDING = 'pending';
const ORDER_PAYMENT_STATUS_CANCELLED = 'cancelled';

const SEND_BACK_MONEY_STATUS_YES = 1;
const SEND_BACK_MONEY_STATUS_NO = 0;

//Booking History
const BOOKING_HISTORY_STATUS_PENDING = 0;
const BOOKING_HISTORY_STATUS_APPROVE = 1;
const BOOKING_HISTORY_STATUS_CANCELLED = 2;
const BOOKING_HISTORY_STATUS_COMPLETED = 3;

//Booking History
const PAYPAL = 'paypal';
const STRIPE = 'stripe';
const BANK = 'bank';
const MOLLIE = 'mollie';
const INSTAMOJO = 'instamojo';
const PAYSTAC = 'paystack';
const SSLCOMMERZ = 'sslcommerz';


const SWR = 'Something went wrong';
