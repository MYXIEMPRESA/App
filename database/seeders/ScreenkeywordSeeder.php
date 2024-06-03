<?php

namespace Database\Seeders;

use App\Models\LanguageKeyword;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Screen;

class ScreenkeywordSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    { 
        $screen_data = 
        [
            [
              "screenID" => "1",
              "ScreenName" => "Walkthrought",
              "keyword_data" => [
                [
                  "screenId" => "1",
                  "keyword_id" => "1",
                  "keyword_name" => "skip",
                  "keyword_value" => "Skip"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "2",
                  "keyword_name" => "getStarted",
                  "keyword_value" => "Get Started"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "3",
                  "keyword_name" => "WALK1_TITLE",
                  "keyword_value" => "With thousands of properties available, Your \\ndream home may be just a few touches away."
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "4",
                  "keyword_name" => "WALK2_TITLE",
                  "keyword_value" => "use our advanced search features to filter \\nproperties, Save time and find the best \\noption for you."
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "5",
                  "keyword_name" => "WALK3_TITLE",
                  "keyword_value" => "From 'For Sale' to 'For Lease,' discover the \\nseamless way to property fulfillment."
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "6",
                  "keyword_name" => "WALK1_TITLE1",
                  "keyword_value" => "Find best place to \\nstay in"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "7",
                  "keyword_name" => "WALK2_TITLE2",
                  "keyword_value" => "fast and easy"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "8",
                  "keyword_name" => "WALK3_TITLE3",
                  "keyword_value" => "Sell Or Rents"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "9",
                  "keyword_name" => "WALK1_TITLE_1",
                  "keyword_value" => "good price"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "10",
                  "keyword_name" => "WALK2_TITLE_2",
                  "keyword_value" => "search"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "11",
                  "keyword_name" => "WALK3_TITLE_3",
                  "keyword_value" => "Property"
                ],
                [
                  "screenId" => "1",
                  "keyword_id" => "271",
                  "keyword_name" => "next",
                  "keyword_value" => "Next"
                ]
              ]
            ],
            [
              "screenID" => "3",
              "ScreenName" => "SignUp Screen",
              "keyword_data" => [
                [
                  "screenId" => "3",
                  "keyword_id" => "12",
                  "keyword_name" => "signUp",
                  "keyword_value" => "Sign Up"
                ],
                [
                  "screenId" => "3",
                  "keyword_id" => "13",
                  "keyword_name" => "firstName",
                  "keyword_value" => "First Name"
                ],
                [
                  "screenId" => "3",
                  "keyword_id" => "14",
                  "keyword_name" => "lastName",
                  "keyword_value" => "Last Name"
                ],
                [
                  "screenId" => "3",
                  "keyword_id" => "15",
                  "keyword_name" => "email",
                  "keyword_value" => "Email"
                ],
                [
                  "screenId" => "3",
                  "keyword_id" => "16",
                  "keyword_name" => "enterEmail",
                  "keyword_value" => "Enter your email"
                ],
                [
                  "screenId" => "3",
                  "keyword_id" => "17",
                  "keyword_name" => "alreadyHaveAccount",
                  "keyword_value" => "Already have an account?"
                ],
                [
                  "screenId" => "3",
                  "keyword_id" => "18",
                  "keyword_name" => "signIn",
                  "keyword_value" => "Sign In"
                ]
              ]
            ],
            [
              "screenID" => "4",
              "ScreenName" => "OTP Screen",
              "keyword_data" => [
                [
                  "screenId" => "4",
                  "keyword_id" => "19",
                  "keyword_name" => "verifyPhoneNumber",
                  "keyword_value" => "Verify Phone Number"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "20",
                  "keyword_name" => "enterTheConfirmationCodeWeSentTo",
                  "keyword_value" => "Enter the confirmation code we sent to"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "21",
                  "keyword_name" => "enterOTP",
                  "keyword_value" => "Enter OTP =>"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "22",
                  "keyword_name" => "didntReceiveCode",
                  "keyword_value" => "Didn’t receive code?"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "23",
                  "keyword_name" => "resend",
                  "keyword_value" => "Resend"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "24",
                  "keyword_name" => "verify",
                  "keyword_value" => "Verify"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "25",
                  "keyword_name" => "enterValidOTP",
                  "keyword_value" => "enter valid otp"
                ],
                [
                  "screenId" => "4",
                  "keyword_id" => "316",
                  "keyword_name" => "invalidOtp",
                  "keyword_value" => "invalid OTP"
                ]
              ]
            ],
            [
              "screenID" => "5",
              "ScreenName" => "Home Screen",
              "keyword_data" => [
                [
                  "screenId" => "5",
                  "keyword_id" => "26",
                  "keyword_name" => "fetchingYourCurrentLocation",
                  "keyword_value" => "Fetching your current location..."
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "27",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "28",
                  "keyword_name" => "chatGpt",
                  "keyword_value" => "ChatGpt"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "29",
                  "keyword_name" => "bhk_title",
                  "keyword_value" => "BHK"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "30",
                  "keyword_name" => "up_to",
                  "keyword_value" => "up to"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "31",
                  "keyword_name" => "selectCity",
                  "keyword_value" => "Select City"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "32",
                  "keyword_name" => "advertisementProperties",
                  "keyword_value" => "Advertisement Properties"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "33",
                  "keyword_name" => "seeAll",
                  "keyword_value" => "See all"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "34",
                  "keyword_name" => "properties",
                  "keyword_value" => "Properties"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "35",
                  "keyword_name" => "lastSearch",
                  "keyword_value" => "Last Search"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "36",
                  "keyword_name" => "selectBHK",
                  "keyword_value" => "Select BHK"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "37",
                  "keyword_name" => "explorePropertiesBasedOnBHKType",
                  "keyword_value" => "Explore Properties based on BHK Type"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "38",
                  "keyword_name" => "nearByProperty",
                  "keyword_value" => "Near By Property"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "39",
                  "keyword_name" => "handpickedPropertiesForYou",
                  "keyword_value" => "Hand picked properties for you"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "40",
                  "keyword_name" => "selectBudget",
                  "keyword_value" => "Select Budget"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "41",
                  "keyword_name" => "explorePropertiesBasedOnBudget",
                  "keyword_value" => "Explore properties based on Budget"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "42",
                  "keyword_name" => "ownerProperties",
                  "keyword_value" => "Owner Properties"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "43",
                  "keyword_name" => "fullyFurnishedProperties",
                  "keyword_value" => "Fully Furnished Properties"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "44",
                  "keyword_name" => "newsArticles",
                  "keyword_value" => "News & Articles"
                ],
                [
                  "screenId" => "5",
                  "keyword_id" => "45",
                  "keyword_name" => "readWhatsHappeningInRealEstate",
                  "keyword_value" => "Read What’s happening in Real Estate"
                ],
                [
                  "screenId" => 5,
                  "keyword_id" => 314,
                  "keyword_name" => "upTo",
                  "keyword_value" => "up to"
                ]
              ]
            ],
            [
              "screenID" => "6",
              "ScreenName" => "Notification Screen",
              "keyword_data" => [
                [
                  "screenId" => "6",
                  "keyword_id" => "46",
                  "keyword_name" => "notification",
                  "keyword_value" => "Notifications"
                ]
              ]
            ],
            [
              "screenID" => "7",
              "ScreenName" => "ChatBot Empty Screen",
              "keyword_data" => [
                [
                  "screenId" => "7",
                  "keyword_id" => "260",
                  "keyword_name" => "chatMessage_1",
                  "keyword_value" => "What are common legal pitfalls to avoid when buying?"
                ],
                [
                  "screenId" => "7",
                  "keyword_id" => "261",
                  "keyword_name" => "chatMessage_2",
                  "keyword_value" => "How can I market my property effectively to attract potential buyers?"
                ],
                [
                  "screenId" => "7",
                  "keyword_id" => "262",
                  "keyword_name" => "chatMessage_3",
                  "keyword_value" => "How do I determine the fair market value of a property??"
                ],
                [
                  "screenId" => "7",
                  "keyword_id" => "305",
                  "keyword_name" => "chatbotQue1",
                  "keyword_value" => "What are common legal pitfalls to avoid when buying?"
                ],
                [
                  "screenId" => "7",
                  "keyword_id" => "306",
                  "keyword_name" => "chatbotQue2",
                  "keyword_value" => "How can I market my property effectively to attract potential buyers?"
                ],
                [
                  "screenId" => "7",
                  "keyword_id" => "307",
                  "keyword_name" => "chatbotQue3",
                  "keyword_value" => "How do I determine the fair market value of a property??"
                ]
              ]
            ],
            [
              "screenID" => "8",
              "ScreenName" => "Chatting Screen",
              "keyword_data" => [
                [
                  "screenId" => "8",
                  "keyword_id" => "47",
                  "keyword_name" => "clearMsg",
                  "keyword_value" => "Do you want to clear the conversations ?"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "48",
                  "keyword_name" => "yes",
                  "keyword_value" => "Yes"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "49",
                  "keyword_name" => "no",
                  "keyword_value" => "No"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "50",
                  "keyword_name" => "aiBot",
                  "keyword_value" => "AI-Bot"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "51",
                  "keyword_name" => "clearConversion",
                  "keyword_value" => "Clear Conversion"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "300",
                  "keyword_name" => "copiedToClipboard",
                  "keyword_value" => "Copied to Clipboard"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "308",
                  "keyword_name" => "tooManyRequestsPleaseTryAgain",
                  "keyword_value" => "Too many requests please try again"
                ],
                [
                  "screenId" => "8",
                  "keyword_id" => "309",
                  "keyword_name" => "howCanIHelpYou",
                  "keyword_value" => "How can i help you..."
                ]
              ]
            ],
            [
              "screenID" => "9",
              "ScreenName" => "No Internet Screen",
              "keyword_data" => [
                [
                  "screenId" => "9",
                  "keyword_id" => "52",
                  "keyword_name" => "noInternet",
                  "keyword_value" => "Your internet is not working"
                ]
              ]
            ],
            [
              "screenID" => "10",
              "ScreenName" => "Search Screen",
              "keyword_data" => [
                [
                  "screenId" => "10",
                  "keyword_id" => "53",
                  "keyword_name" => "useMyCurrentLocation",
                  "keyword_value" => "Use My Current Location"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "54",
                  "keyword_name" => "recentSearch",
                  "keyword_value" => "Recent Search"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "55",
                  "keyword_name" => "foundState",
                  "keyword_value" => "Found 0 estates"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "56",
                  "keyword_name" => "searchNotFound",
                  "keyword_value" => "Search not found"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "57",
                  "keyword_name" => "searchMsg",
                  "keyword_value" => "Oops! We can not found result."
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "58",
                  "keyword_name" => "forRent",
                  "keyword_value" => "For Rent"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "59",
                  "keyword_name" => "forSell",
                  "keyword_value" => "For Sell"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "60",
                  "keyword_name" => "pg",
                  "keyword_value" => "PG"
                ],
                [
                  "screenId" => "10",
                  "keyword_id" => "283",
                  "keyword_name" => "searchLocation",
                  "keyword_value" => "Search by location"
                ]
              ]
            ],
            [
              "screenID" => "11",
              "ScreenName" => "Filter Screen",
              "keyword_data" => [
                [
                  "screenId" => "11",
                  "keyword_id" => "61",
                  "keyword_name" => "clearFilter",
                  "keyword_value" => "Clear Filter"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "62",
                  "keyword_name" => "priceRange",
                  "keyword_value" => "Price Range"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "63",
                  "keyword_name" => "postedSince",
                  "keyword_value" => "Posted Since"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "64",
                  "keyword_name" => "location",
                  "keyword_value" => "Location"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "65",
                  "keyword_name" => "chooseLocation",
                  "keyword_value" => "Choose Location"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "266",
                  "keyword_name" => "filter",
                  "keyword_value" => "Filter"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "267",
                  "keyword_name" => "anytime",
                  "keyword_value" => "AnyTime"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "268",
                  "keyword_name" => "applyFilter",
                  "keyword_value" => "Apply Filter"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "277",
                  "keyword_name" => "lastWeek",
                  "keyword_value" => "LastWeek"
                ],
                [
                  "screenId" => "11",
                  "keyword_id" => "278",
                  "keyword_name" => "yesterday",
                  "keyword_value" => "Yesterday"
                ]
              ]
            ],
            [
              "screenID" => "12",
              "ScreenName" => "Search Result Screen",
              "keyword_data" => [
                [
                  "screenId" => "12",
                  "keyword_id" => "66",
                  "keyword_name" => "searchResult",
                  "keyword_value" => "Search Result"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "67",
                  "keyword_name" => "search",
                  "keyword_value" => "Search"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "68",
                  "keyword_name" => "found",
                  "keyword_value" => "Found"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "69",
                  "keyword_name" => "estates",
                  "keyword_value" => "estates"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "70",
                  "keyword_name" => "forSell",
                  "keyword_value" => "For Sell"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "71",
                  "keyword_name" => "pg",
                  "keyword_value" => "PG"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "72",
                  "keyword_name" => "searchNotFound",
                  "keyword_value" => "Search not found"
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "73",
                  "keyword_name" => "searchMsg",
                  "keyword_value" => "Oops! We can not found result."
                ],
                [
                  "screenId" => "12",
                  "keyword_id" => "74",
                  "keyword_name" => "forRent",
                  "keyword_value" => "For Rent"
                ]
              ]
            ],
            [
              "screenID" => "13",
              "ScreenName" => "Category Screen",
              "keyword_data" => [
                [
                  "screenId" => "13",
                  "keyword_id" => "75",
                  "keyword_name" => "category",
                  "keyword_value" => "Category"
                ]
              ]
            ],
            [
              "screenID" => "14",
              "ScreenName" => "Add Property Screen",
              "keyword_data" => [
                [
                  "screenId" => "14",
                  "keyword_id" => "76",
                  "keyword_name" => "updateProperty",
                  "keyword_value" => "Update Property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "77",
                  "keyword_name" => "addProperty",
                  "keyword_value" => "Add Property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "78",
                  "keyword_name" => "Continue",
                  "keyword_value" => "Continue"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "79",
                  "keyword_name" => "submit",
                  "keyword_value" => "Submit"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "80",
                  "keyword_name" => "pleaseSelectCategory",
                  "keyword_value" => "Please select category"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "81",
                  "keyword_name" => "pleaseSelectPriceDuration",
                  "keyword_value" => "Please select Price Duration"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "82",
                  "keyword_name" => "pleaseSelectMainPicture",
                  "keyword_value" => "Please select main picture"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "83",
                  "keyword_name" => "pleaseSelectOtherPicture",
                  "keyword_value" => "Please select other picture"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "84",
                  "keyword_name" => "pleaseSelectBHK",
                  "keyword_value" => "Please select bhk"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "85",
                  "keyword_name" => "pleaseSelectAddress",
                  "keyword_value" => "Please select Address"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "86",
                  "keyword_name" => "areYouA",
                  "keyword_value" => "Are you a"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "87",
                  "keyword_name" => "selectCategory",
                  "keyword_value" => "Select Category"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "88",
                  "keyword_name" => "propertyName",
                  "keyword_value" => "Property Name"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "89",
                  "keyword_name" => "enterPropertyName",
                  "keyword_value" => "Enter property name"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "90",
                  "keyword_name" => "selectBHK",
                  "keyword_value" => "Select BHK"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "91",
                  "keyword_name" => "bhk",
                  "keyword_value" => "BHK"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "92",
                  "keyword_name" => "furnishType",
                  "keyword_value" => "Furnished Type"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "93",
                  "keyword_name" => "selectFurnishedType",
                  "keyword_value" => "Select furnished type"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "94",
                  "keyword_name" => "squareFeetArea",
                  "keyword_value" => "Square Feet Area"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "95",
                  "keyword_name" => "enterSquareFeetArea",
                  "keyword_value" => "Enter square feet area"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "96",
                  "keyword_name" => "ageOfProperty",
                  "keyword_value" => "Age Of Property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "97",
                  "keyword_name" => "year",
                  "keyword_value" => "(Year)"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "98",
                  "keyword_name" => "enterAgeOfProperty",
                  "keyword_value" => "Enter age of property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "99",
                  "keyword_name" => "description",
                  "keyword_value" => "Description"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "100",
                  "keyword_name" => "writeSomethingHere",
                  "keyword_value" => "Write something here..."
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "101",
                  "keyword_name" => "price",
                  "keyword_value" => "Price"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "102",
                  "keyword_name" => "enterPrice",
                  "keyword_value" => "Enter price"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "103",
                  "keyword_name" => "priceDuration",
                  "keyword_value" => "Price Duration"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "104",
                  "keyword_name" => "selectPriceDuration",
                  "keyword_value" => "Select price duration"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "105",
                  "keyword_name" => "securityDeposit",
                  "keyword_value" => "Security Deposit"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "106",
                  "keyword_name" => "enterSecurityDeposit",
                  "keyword_value" => "Enter Security Deposit"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "107",
                  "keyword_name" => "brokerage",
                  "keyword_value" => "Brokerage"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "108",
                  "keyword_name" => "enterBrokerage",
                  "keyword_value" => "Enter Brokerage"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "109",
                  "keyword_name" => "maintenanceCharges",
                  "keyword_value" => "Maintenance Charges (Per Month)"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "110",
                  "keyword_name" => "enterMaintenanceCharge",
                  "keyword_value" => "Enter maintenance charge"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "111",
                  "keyword_name" => "address",
                  "keyword_value" => "Address"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "112",
                  "keyword_name" => "chooseOnMap",
                  "keyword_value" => "Choose On Map"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "113",
                  "keyword_name" => "country",
                  "keyword_value" => "Country"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "114",
                  "keyword_name" => "pleaseChooseAddressFromMap",
                  "keyword_value" => "Please choose address from map"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "115",
                  "keyword_name" => "state",
                  "keyword_value" => "State"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "116",
                  "keyword_name" => "city",
                  "keyword_value" => "City"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "117",
                  "keyword_name" => "addPicture",
                  "keyword_value" => "Add Picture"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "118",
                  "keyword_name" => "addMainPicture",
                  "keyword_value" => "Add Main Picture"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "119",
                  "keyword_name" => "addOtherPicture",
                  "keyword_value" => "Add Other Picture"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "120",
                  "keyword_name" => "addOtherPictures",
                  "keyword_value" => "Add Other Pictures"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "121",
                  "keyword_name" => "videoUrl",
                  "keyword_value" => "Video URL"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "122",
                  "keyword_name" => "priceDurationValue",
                  "keyword_value" => "Price Duration Value"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "123",
                  "keyword_name" => "enterVideoUrl",
                  "keyword_value" => "Enter video Url"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "124",
                  "keyword_name" => "premiumProperty",
                  "keyword_value" => "Premium Property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "125",
                  "keyword_name" => "extraFacilities",
                  "keyword_value" => "Extra Facilities"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "126",
                  "keyword_name" => "pleaseAddAmenities",
                  "keyword_value" => "Please add Amenities"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "286",
                  "keyword_name" => "iWantTo",
                  "keyword_value" => "i want to"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "297",
                  "keyword_name" => "advertisementHistory",
                  "keyword_value" => "Advertisement History"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "298",
                  "keyword_name" => "addRequiredAmenityMessage",
                  "keyword_value" => "Please add required Amenities"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "301",
                  "keyword_name" => "updateProperty",
                  "keyword_value" => "Update Property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "302",
                  "keyword_name" => "rentProperty",
                  "keyword_value" => "Rent property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "303",
                  "keyword_name" => "sellProperty",
                  "keyword_value" => "Sell property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "304",
                  "keyword_name" => "pgColivingProperty",
                  "keyword_value" => "PG\/Co-living property"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "328",
                  "keyword_name" => "propertyHasBeenSaveSuccessfully",
                  "keyword_value" => "Property has been save successfully"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "329",
                  "keyword_name" => "planHasExpired",
                  "keyword_value" => "Plan Has Expired"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "334",
                  "keyword_name" => "daily",
                  "keyword_value" => "Daily"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "337",
                  "keyword_name" => "monthly",
                  "keyword_value" => "Monthly"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "338",
                  "keyword_name" => "quarterly",
                  "keyword_value" => "Quarterly"
                ],
                [
                  "screenId" => "14",
                  "keyword_id" => "339",
                  "keyword_name" => "yearly",
                  "keyword_value" => "Yearly"
                ]
              ]
            ],
            [
              "screenID" => "15",
              "ScreenName" => "Property Detail Screen",
              "keyword_data" => [
                [
                  "screenId" => "15",
                  "keyword_id" => "127",
                  "keyword_name" => "ageOfProperty",
                  "keyword_value" => "Age Of Property"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "128",
                  "keyword_name" => "year",
                  "keyword_value" => "(Year)"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "129",
                  "keyword_name" => "forSell",
                  "keyword_value" => "For Sell"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "130",
                  "keyword_name" => "pgCoLiving",
                  "keyword_value" => "PG\/Co-living"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "131",
                  "keyword_name" => "edit",
                  "keyword_value" => "Edit"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "132",
                  "keyword_name" => "delete",
                  "keyword_value" => "Delete"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "133",
                  "keyword_name" => "deletePropertyMsg",
                  "keyword_value" => "Are you sure you want to Delete Property ?"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "134",
                  "keyword_name" => "costOfLiving",
                  "keyword_value" => "Cost Of Living"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "135",
                  "keyword_name" => "securityDeposit",
                  "keyword_value" => "Security Deposit"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "136",
                  "keyword_name" => "maintenanceCharges",
                  "keyword_value" => "Maintenance Charges (Per Month)"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "137",
                  "keyword_name" => "brokerage",
                  "keyword_value" => "Brokerage"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "138",
                  "keyword_name" => "totalExtraCost",
                  "keyword_value" => "Total Extra Cost"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "139",
                  "keyword_name" => "location",
                  "keyword_value" => "Location"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "140",
                  "keyword_name" => "viewOnMap",
                  "keyword_value" => "View on Map"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "141",
                  "keyword_name" => "gallery",
                  "keyword_value" => "Gallery"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "142",
                  "keyword_name" => "description",
                  "keyword_value" => "Description"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "143",
                  "keyword_name" => "property",
                  "keyword_value" => "Property"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "144",
                  "keyword_name" => "bhk",
                  "keyword_value" => "BHK"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "145",
                  "keyword_name" => "semiFurnished",
                  "keyword_value" => "Semi Furnished"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "146",
                  "keyword_name" => "unfurnished",
                  "keyword_value" => "Unfurnished"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "147",
                  "keyword_name" => "NearestByGoogle",
                  "keyword_value" => "Nearest places provided by google"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "269",
                  "keyword_name" => "fullyFurnished",
                  "keyword_value" => "Fully Furnished"
                ],
                [
                  "screenId" => "15",
                  "keyword_id" => "320",
                  "keyword_name" => "tapToViewContactInfo",
                  "keyword_value" => "Tap to view contact info"
                ]
              ]
            ],
            [
              "screenID" => "16",
              "ScreenName" => "Favourite Screen",
              "keyword_data" => [
                [
                  "screenId" => "16",
                  "keyword_id" => "148",
                  "keyword_name" => "favourite",
                  "keyword_value" => "Favorite"
                ],
                [
                  "screenId" => "16",
                  "keyword_id" => "149",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ]
              ]
            ],
            [
              "screenID" => "17",
              "ScreenName" => "Profile Screen",
              "keyword_data" => [
                [
                  "screenId" => "17",
                  "keyword_id" => "150",
                  "keyword_name" => "myProfile",
                  "keyword_value" => "My Profile"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "151",
                  "keyword_name" => "yourCurrentPlan",
                  "keyword_value" => "Your Current Plan"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "319",
                  "keyword_name" => "viewPropertyContactHistory",
                  "keyword_value" => "View Property Contact History"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "153",
                  "keyword_name" => "deleteAccountMessage",
                  "keyword_value" => "Are you sure you want to delete your account ?"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "154",
                  "keyword_name" => "advertisement",
                  "keyword_value" => "Advertisement"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "155",
                  "keyword_name" => "contactInfo",
                  "keyword_value" => "Contact Info"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "156",
                  "keyword_name" => "myProperty",
                  "keyword_value" => "My Properties"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "157",
                  "keyword_name" => "newsArticles",
                  "keyword_value" => "News & Articles"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "158",
                  "keyword_name" => "setting",
                  "keyword_value" => "Settings"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "159",
                  "keyword_name" => "aboutApp",
                  "keyword_value" => "About App"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "160",
                  "keyword_name" => "deleteAccount",
                  "keyword_value" => "Delete Account"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "161",
                  "keyword_name" => "delete",
                  "keyword_value" => "Delete"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "162",
                  "keyword_name" => "logOut",
                  "keyword_value" => "Logout"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "163",
                  "keyword_name" => "logoutMsg",
                  "keyword_value" => "Are you sure you want to logout from device?"
                ],
                [
                  "screenId" => "17",
                  "keyword_id" => "270",
                  "keyword_name" => "subscription",
                  "keyword_value" => "Subscriptions"
                ]
              ]
            ],
            [
              "screenID" => "18",
              "ScreenName" => "Payment Screen",
              "keyword_data" => [
                [
                  "screenId" => "18",
                  "keyword_id" => "164",
                  "keyword_name" => "pay",
                  "keyword_value" => "Pay"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "165",
                  "keyword_name" => "failed",
                  "keyword_value" => "Failed"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "282",
                  "keyword_name" => "success",
                  "keyword_value" => "Success"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "287",
                  "keyword_name" => "paymentFailed",
                  "keyword_value" => "Payment Failed"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "291",
                  "keyword_name" => "payments",
                  "keyword_value" => "Payments"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "317",
                  "keyword_name" => "transactionSuccessful",
                  "keyword_value" => "Transaction Successful"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "318",
                  "keyword_name" => "transactionFailed",
                  "keyword_value" => "Transaction Failed"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "335",
                  "keyword_name" => "testPayment",
                  "keyword_value" => "Test Payment"
                ],
                [
                  "screenId" => "18",
                  "keyword_id" => "336",
                  "keyword_name" => "payWithCard",
                  "keyword_value" => "Pay with Card"
                ]
              ]
            ],
            [
              "screenID" => "19",
              "ScreenName" => "View Property Contact History",
              "keyword_data" => [
                [
                  "screenId" => "19",
                  "keyword_id" => "166",
                  "keyword_name" => "seenOn",
                  "keyword_value" => "Seen on"
                ],
                [
                  "screenId" => "19",
                  "keyword_id" => "168",
                  "keyword_name" => "inquiryFor",
                  "keyword_value" => "Inquiry for"
                ]
              ]
            ],
            [
              "screenID" => "20",
              "ScreenName" => "Edit Profile Screen",
              "keyword_data" => [
                [
                  "screenId" => "20",
                  "keyword_id" => "169",
                  "keyword_name" => "editProfile",
                  "keyword_value" => "Edit Profile"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "170",
                  "keyword_name" => "save",
                  "keyword_value" => "Save"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "171",
                  "keyword_name" => "firstName",
                  "keyword_value" => "First Name"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "172",
                  "keyword_name" => "enterFirstName",
                  "keyword_value" => "Enter your first name"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "173",
                  "keyword_name" => "lastName",
                  "keyword_value" => "Last Name"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "174",
                  "keyword_name" => "enterLastName",
                  "keyword_value" => "Enter your last name"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "175",
                  "keyword_name" => "email",
                  "keyword_value" => "Email"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "176",
                  "keyword_name" => "enterEmail",
                  "keyword_value" => "Enter your email"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "177",
                  "keyword_name" => "phoneNumber",
                  "keyword_value" => "Phone Number"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "178",
                  "keyword_name" => "enterPhone",
                  "keyword_value" => "Phone Number"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "179",
                  "keyword_name" => "camera",
                  "keyword_value" => "Camera"
                ],
                [
                  "screenId" => "20",
                  "keyword_id" => "180",
                  "keyword_name" => "chooseImage",
                  "keyword_value" => "Choose Image"
                ]
              ]
            ],
            [
              "screenID" => "21",
              "ScreenName" => "Property Contact History Screen",
              "keyword_data" => [
                [
                  "screenId" => "21",
                  "keyword_id" => "181",
                  "keyword_name" => "contactInfoDetails",
                  "keyword_value" => "contact info details"
                ]
              ]
            ],
            [
              "screenID" => "22",
              "ScreenName" => "Slider Details Screen",
              "keyword_data" => [
                [
                  "screenId" => "22",
                  "keyword_id" => "182",
                  "keyword_name" => "tapToView",
                  "keyword_value" => "Tap to view"
                ]
              ]
            ],
            [
              "screenID" => "23",
              "ScreenName" => "Subscription Detail Screen",
              "keyword_data" => [
                [
                  "screenId" => "23",
                  "keyword_id" => "183",
                  "keyword_name" => "subscriptionPlans",
                  "keyword_value" => "Subscription Plans"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => "184",
                  "keyword_name" => "active",
                  "keyword_value" => "Active"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => "185",
                  "keyword_name" => "history",
                  "keyword_value" => "History"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 186,
                  "keyword_name" => "subscriptionMsg",
                  "keyword_value" => "You have not any subscription plans"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 187,
                  "keyword_name" => "cancelled",
                  "keyword_value" => "Cancelled"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 188,
                  "keyword_name" => "viewPlans",
                  "keyword_value" => "View Plans"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 189,
                  "keyword_name" => "yourPlanValid",
                  "keyword_value" => "Your plan valid"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 190,
                  "keyword_name" => "viewPropertyLimit",
                  "keyword_value" => "View property limit"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 191,
                  "keyword_name" => "unlimited",
                  "keyword_value" => "Unlimited"
                ],
                [
                  "screenId" => "23",
                  "keyword_id" => 192,
                  "keyword_name" => "addPropertyLimit",
                  "keyword_value" => "Add property limit"
                ],
                [
                  "screenId" => 23,
                  "keyword_id" => 284,
                  "keyword_name" => "to",
                  "keyword_value" => "to"
                ],
                [
                  "screenId" => 23,
                  "keyword_id" => 340,
                  "keyword_name" => "cancelSubscriptionMsg",
                  "keyword_value" => "Are you sure you want to cancel current subscription plan?"
                ],
                [
                  "screenId" => 23,
                  "keyword_id" => 341,
                  "keyword_name" => "cancelSubscription",
                  "keyword_value" => "Cancel Subscription"
                ],
                [
                  "screenId" => 23,
                  "keyword_id" => 342,
                  "keyword_name" => "cancelledOn",
                  "keyword_value" => "Cancelled on?"
                ],
                [
                  "screenId" => 23,
                  "keyword_id" => 343,
                  "keyword_name" => "paymentVia",
                  "keyword_value" => "Payment via"
                ],
              ]
            ],
            [
              "screenID" => "24",
              "ScreenName" => "About Us Screen",
              "keyword_data" => [
                [
                  "screenId" => "24",
                  "keyword_id" => "200",
                  "keyword_name" => "aboutUs",
                  "keyword_value" => "About Us"
                ],
                [
                  "screenId" => "24",
                  "keyword_id" => "201",
                  "keyword_name" => "followUs",
                  "keyword_value" => "Follow Us"
                ],
                [
                  "screenId" => "24",
                  "keyword_id" => "296",
                  "keyword_name" => "mailto",
                  "keyword_value" => "mailto =>"
                ]
              ]
            ],
            [
              "screenID" => "25",
              "ScreenName" => "Advertisement See All Screen",
              "keyword_data" => [
                [
                  "screenId" => "25",
                  "keyword_id" => "202",
                  "keyword_name" => "advertisementProperties",
                  "keyword_value" => "Advertisement Properties"
                ],
                [
                  "screenId" => "25",
                  "keyword_id" => "203",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ]
              ]
            ],
            [
              "screenID" => "26",
              "ScreenName" => "Amenity Screen",
              "keyword_data" => [
                [
                  "screenId" => "26",
                  "keyword_id" => "204",
                  "keyword_name" => "extraFacilities",
                  "keyword_value" => "Extra Facilities"
                ]
              ]
            ],
            [
              "screenID" => "27",
              "ScreenName" => "Dashboard Screen",
              "keyword_data" => [
                [
                  "screenId" => "27",
                  "keyword_id" => "205",
                  "keyword_name" => "addProperties",
                  "keyword_value" => "Add Properties"
                ]
              ]
            ],
            [
              "screenID" => "28",
              "ScreenName" => "Privacy Policy Screen",
              "keyword_data" => [
                [
                  "screenId" => "28",
                  "keyword_id" => "206",
                  "keyword_name" => "privacyPolicy",
                  "keyword_value" => "Privacy Policy"
                ]
              ]
            ],
            [
              "screenID" => "29",
              "ScreenName" => "Terms Conditions Screen",
              "keyword_data" => [
                [
                  "screenId" => "29",
                  "keyword_id" => "207",
                  "keyword_name" => "termsCondition",
                  "keyword_value" => "Terms & Conditions"
                ]
              ]
            ],
            [
              "screenID" => "30",
              "ScreenName" => "Success Property Screen",
              "keyword_data" => [
                [
                  "screenId" => "30",
                  "keyword_id" => "208",
                  "keyword_name" => "congratulations",
                  "keyword_value" => "Congratulations!"
                ],
                [
                  "screenId" => "30",
                  "keyword_id" => "209",
                  "keyword_name" => "yourPropertySubmittedSuccessfully",
                  "keyword_value" => "Your Property Submitted Successfully!"
                ],
                [
                  "screenId" => "30",
                  "keyword_id" => "210",
                  "keyword_name" => "previewProperty",
                  "keyword_value" => "Preview Property"
                ],
                [
                  "screenId" => "30",
                  "keyword_id" => "211",
                  "keyword_name" => "backToHome",
                  "keyword_value" => "Back to home"
                ]
              ]
            ],
            [
              "screenID" => "31",
              "ScreenName" => "Owner Furnished SeeAll Screen",
              "keyword_data" => [
                [
                  "screenId" => "31",
                  "keyword_id" => "212",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ]
              ]
            ],
            [
              "screenID" => "33",
              "ScreenName" => "News All Screen",
              "keyword_data" => [
                [
                  "screenId" => "33",
                  "keyword_id" => "214",
                  "keyword_name" => "newsArticles",
                  "keyword_value" => "News & Articles"
                ]
              ]
            ],
            [
              "screenID" => "34",
              "ScreenName" => "Help Center Screen",
              "keyword_data" => [
                [
                  "screenId" => "34",
                  "keyword_id" => "215",
                  "keyword_name" => "aboutApp",
                  "keyword_value" => "About App"
                ],
                [
                  "screenId" => "34",
                  "keyword_id" => "216",
                  "keyword_name" => "privacyPolicy",
                  "keyword_value" => "Privacy Policy"
                ],
                [
                  "screenId" => "34",
                  "keyword_id" => "217",
                  "keyword_name" => "termsCondition",
                  "keyword_value" => "Terms & Conditions"
                ],
                [
                  "screenId" => "34",
                  "keyword_id" => "218",
                  "keyword_name" => "aboutUs",
                  "keyword_value" => "About Us"
                ]
              ]
            ],
            [
              "screenID" => "35",
              "ScreenName" => "Setting Screen",
              "keyword_data" => [
                [
                  "screenId" => "35",
                  "keyword_id" => "219",
                  "keyword_name" => "language",
                  "keyword_value" => "Select Language"
                ],
                [
                  "screenId" => "35",
                  "keyword_id" => "220",
                  "keyword_name" => "appTheme",
                  "keyword_value" => "App Theme"
                ],
                [
                  "screenId" => "35",
                  "keyword_id" => "221",
                  "keyword_name" => "setting",
                  "keyword_value" => "Settings"
                ],
                [
                  "screenId" => "35",
                  "keyword_id" => "263",
                  "keyword_name" => "systemDefault",
                  "keyword_value" => "System Default"
                ]
              ]
            ],
            [
              "screenID" => "36",
              "ScreenName" => "No DataScreen",
              "keyword_data" => [
                [
                  "screenId" => "36",
                  "keyword_id" => "222",
                  "keyword_name" => "noFoundData",
                  "keyword_value" => "No Data Found"
                ]
              ]
            ],
            [
              "screenID" => "37",
              "ScreenName" => "Limit Screen",
              "keyword_data" => [
                [
                  "screenId" => "37",
                  "keyword_id" => "223",
                  "keyword_name" => "purchase",
                  "keyword_value" => "Purchase"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "224",
                  "keyword_name" => "pleaseSelectLimit",
                  "keyword_value" => "Please select at least one limit"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "225",
                  "keyword_name" => "limit",
                  "keyword_value" => "limit"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "226",
                  "keyword_name" => "addPropertyLimit",
                  "keyword_value" => "Add property limit"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "227",
                  "keyword_name" => "contactInfoLimit",
                  "keyword_value" => "Add Contact info Limit"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "228",
                  "keyword_name" => "addAdvertisementLimit",
                  "keyword_value" => "Add Advertisement Limit"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "292",
                  "keyword_name" => "limitExceeded",
                  "keyword_value" => "Limit Exceeded!"
                ],
                [
                  "screenId" => "37",
                  "keyword_id" => "293",
                  "keyword_name" => "limitMsg",
                  "keyword_value" => "Extend your limit and keep growing with mighty eProperty. 🚀"
                ]
              ]
            ],
            [
              "screenID" => "38",
              "ScreenName" => "My Properties Screen",
              "keyword_data" => [
                [
                  "screenId" => "38",
                  "keyword_id" => "229",
                  "keyword_name" => "myProperty",
                  "keyword_value" => "My Properties"
                ],
                [
                  "screenId" => "38",
                  "keyword_id" => "230",
                  "keyword_name" => "addNew",
                  "keyword_value" => "Add New"
                ],
                [
                  "screenId" => "38",
                  "keyword_id" => "231",
                  "keyword_name" => "boostYourProperty",
                  "keyword_value" => "Boost Your Property"
                ],
                [
                  "screenId" => "38",
                  "keyword_id" => "280",
                  "keyword_name" => "sell",
                  "keyword_value" => "Sell"
                ],
                [
                  "screenId" => "38",
                  "keyword_id" => "281",
                  "keyword_name" => "rent",
                  "keyword_value" => "Rent"
                ],
                [
                  "screenId" => "38",
                  "keyword_id" => "288",
                  "keyword_name" => "alreadyBoostedYourProperty",
                  "keyword_value" => "Already Boosted Your Property"
                ]
              ]
            ],
            [
              "screenID" => "39",
              "ScreenName" => "Select Property List Screen",
              "keyword_data" => [
                [
                  "screenId" => "39",
                  "keyword_id" => "232",
                  "keyword_name" => "selectPropertyType",
                  "keyword_value" => "Select Property Type"
                ]
              ]
            ],
            [
              "screenID" => "40",
              "ScreenName" => "See All Screen",
              "keyword_data" => [
                [
                  "screenId" => "40",
                  "keyword_id" => "233",
                  "keyword_name" => "properties",
                  "keyword_value" => "Properties"
                ],
                [
                  "screenId" => "40",
                  "keyword_id" => "234",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ]
              ]
            ],
            [
              "screenID" => "41",
              "ScreenName" => "Property Contact Info Screen",
              "keyword_data" => [
                [
                  "screenId" => "41",
                  "keyword_id" => "235",
                  "keyword_name" => "propertyContactInfo",
                  "keyword_value" => "Property Contact Info"
                ]
              ]
            ],
            [
              "screenID" => "42",
              "ScreenName" => "Login Screen",
              "keyword_data" => [
                [
                  "screenId" => "42",
                  "keyword_id" => "236",
                  "keyword_name" => "signIn",
                  "keyword_value" => "Sign In"
                ],
                [
                  "screenId" => "42",
                  "keyword_id" => "237",
                  "keyword_name" => "mobileNumber",
                  "keyword_value" => "Mobile Number"
                ],
                [
                  "screenId" => "42",
                  "keyword_id" => "238",
                  "keyword_name" => "enterYourMobileNumber",
                  "keyword_value" => "Enter Your Mobile Number"
                ]
              ]
            ],
            [
              "screenID" => "43",
              "ScreenName" => "Add Property History Screen",
              "keyword_data" => [
                [
                  "screenId" => "43",
                  "keyword_id" => "239",
                  "keyword_name" => "addPropertyHistory",
                  "keyword_value" => "Add Property History"
                ],
                [
                  "screenId" => "43",
                  "keyword_id" => "240",
                  "keyword_name" => "advertisementHistor",
                  "keyword_value" => "Advertisement History"
                ]
              ]
            ],
            [
              "screenID" => "44",
              "ScreenName" => "Category Selected Screen",
              "keyword_data" => [
                [
                  "screenId" => "44",
                  "keyword_id" => "241",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ]
              ]
            ],
            [
              "screenID" => "45",
              "ScreenName" => "Google Map Screen",
              "keyword_data" => [
                [
                  "screenId" => "45",
                  "keyword_id" => "255",
                  "keyword_name" => "chooseLocation",
                  "keyword_value" => "Choose Location"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "256",
                  "keyword_name" => "searchAddress",
                  "keyword_value" => "Search Address"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "257",
                  "keyword_name" => "pleaseWait",
                  "keyword_value" => "Please Wait"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "258",
                  "keyword_name" => "confirmAddress",
                  "keyword_value" => "Confirm Address"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "259",
                  "keyword_name" => "somethingWentWrong",
                  "keyword_value" => "something went wrong"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "310",
                  "keyword_name" => "chooseLocation",
                  "keyword_value" => "Choose Location"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "311",
                  "keyword_name" => "searchLocation",
                  "keyword_value" => "Search Address"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "312",
                  "keyword_name" => "pleaseWait",
                  "keyword_value" => "Please Wait"
                ],
                [
                  "screenId" => "45",
                  "keyword_id" => "313",
                  "keyword_name" => "confirmAddress",
                  "keyword_value" => "Confirm Address"
                ]
              ]
            ],
            [
              "screenID" => "46",
              "ScreenName" => "Language Screen",
              "keyword_data" => [
                [
                  "screenId" => "46",
                  "keyword_id" => "242",
                  "keyword_name" => "language",
                  "keyword_value" => "Select Language"
                ]
              ]
            ],
            [
              "screenID" => "47",
              "ScreenName" => "Near By See All Screen",
              "keyword_data" => [
                [
                  "screenId" => "47",
                  "keyword_id" => "243",
                  "keyword_name" => "nearByProperty",
                  "keyword_value" => "Near By Property"
                ],
                [
                  "screenId" => "47",
                  "keyword_id" => "244",
                  "keyword_name" => "resultNotFound",
                  "keyword_value" => "Result Not Found"
                ]
              ]
            ],
            [
              "screenID" => "48",
              "ScreenName" => "News Details Screen",
              "keyword_data" => [
                [
                  "screenId" => "48",
                  "keyword_id" => "245",
                  "keyword_name" => "checkoutNewsArticles",
                  "keyword_value" => "Checkout News & Articles"
                ]
              ]
            ],
            [
              "screenID" => "49",
              "ScreenName" => "Subscribe Screen",
              "keyword_data" => [
                [
                  "screenId" => "49",
                  "keyword_id" => "246",
                  "keyword_name" => "subscriptionPlans",
                  "keyword_value" => "Subscription Plans"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "247",
                  "keyword_name" => "subscribe",
                  "keyword_value" => "Subscribe"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "248",
                  "keyword_name" => "bePremiumGetUnlimitedAccess",
                  "keyword_value" => "Be Premium Get Unlimited Access"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "249",
                  "keyword_name" => "enjoyUnlimitedAccessWithoutAdsAndRestrictions",
                  "keyword_value" => "Enjoy Unlimited Access Without Ads And Restrictions"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "250",
                  "keyword_name" => "viewPropertyLimit",
                  "keyword_value" => "View property limit"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "251",
                  "keyword_name" => "unlimited",
                  "keyword_value" => "Unlimited"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "252",
                  "keyword_name" => "addPropertyLimit",
                  "keyword_value" => "Add property limit"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "253",
                  "keyword_name" => "advertisementLimit",
                  "keyword_value" => "Advertisement limit"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "254",
                  "keyword_name" => "noData",
                  "keyword_value" => "No Data"
                ],
                [
                  "screenId" => "49",
                  "keyword_id" => "285",
                  "keyword_name" => "pleaseSelectPlantContinue",
                  "keyword_value" => "please select plan to continue"
                ]
              ]
            ],
            [
              "screenID" => "50",
              "ScreenName" => "Other Screen",
              "keyword_data" => [
                [
                  "screenId" => "50",
                  "keyword_id" => "264",
                  "keyword_name" => "cancel",
                  "keyword_value" => "Cancel"
                ],
                [
                  "screenId" => "50",
                  "keyword_id" => "272",
                  "keyword_name" => "individual",
                  "keyword_value" => "Individual"
                ],
                [
                  "screenId" => "50",
                  "keyword_id" => "273",
                  "keyword_name" => "userNotFound",
                  "keyword_value" => "User Not Found"
                ],
                [
                  "screenId" => "50",
                  "keyword_id" => "274",
                  "keyword_name" => "allowLocationPermission",
                  "keyword_value" => "Allow Location Permission"
                ],
                [
                  "screenId" => "50",
                  "keyword_id" => "279",
                  "keyword_name" => "premium",
                  "keyword_value" => "Premium"
                ],
                [
                  "screenId" => "50",
                  "keyword_id" => "299",
                  "keyword_name" => "enter",
                  "keyword_value" => "Enter"
                ]
              ]
            ],
            [
              "screenID" => "51",
              "ScreenName" => "payment success screen",
              "keyword_data" => [
                [
                  "screenId" => "51",
                  "keyword_id" => "265",
                  "keyword_name" => "chooseTheme",
                  "keyword_value" => "Choose theme"
                ],
                [
                  "screenId" => "51",
                  "keyword_id" => "275",
                  "keyword_name" => "light",
                  "keyword_value" => "Light"
                ],
                [
                  "screenId" => "51",
                  "keyword_id" => "276",
                  "keyword_name" => "dark",
                  "keyword_value" => "Dark"
                ],
                [
                  "screenId" => "51",
                  "keyword_id" => "294",
                  "keyword_name" => "paymentSuccessfullyDone",
                  "keyword_value" => "Payment successfully done!"
                ],
                [
                  "screenId" => "51",
                  "keyword_id" => "295",
                  "keyword_name" => "paymentSuccessfullyMsg",
                  "keyword_value" => "Yippee 🥳, you ve been unlocked amazing features"
                ]
              ]
            ],
            [
              "screenID" => "52",
              "ScreenName" => "boost screen",
              "keyword_data" => [
                [
                  "screenId" => "52",
                  "keyword_id" => "289",
                  "keyword_name" => "boost",
                  "keyword_value" => "Boost"
                ],
                [
                  "screenId" => "52",
                  "keyword_id" => "290",
                  "keyword_name" => "boostMsg",
                  "keyword_value" => "Are you sure you want to boost your property ?"
                ]
              ]
            ],
            [
              "screenID" => "53",
              "ScreenName" => "constants screen",
              "keyword_data" => [
                [
                  "screenId" => "53",
                  "keyword_id" => "321",
                  "keyword_name" => "thisFieldIsRequired",
                  "keyword_value" => "This field is required"
                ],
                [
                  "screenId" => "53",
                  "keyword_id" => "323",
                  "keyword_name" => "owner",
                  "keyword_value" => "Owner"
                ],
                [
                  "screenId" => "53",
                  "keyword_id" => "324",
                  "keyword_name" => "broker",
                  "keyword_value" => "Broker"
                ],
                [
                  "screenId" => "53",
                  "keyword_id" => "325",
                  "keyword_name" => "builder",
                  "keyword_value" => "Builder"
                ],
                [
                  "screenId" => "53",
                  "keyword_id" => "326",
                  "keyword_name" => "agent",
                  "keyword_value" => "Agent"
                ]
              ]
            ],
            [
              "screenID" => "54",
              "ScreenName" => "constants screen",
              "keyword_data" => [
                [
                  "screenId" => "54",
                  "keyword_id" => "327",
                  "keyword_name" => "pressBackAgainToExit",
                  "keyword_value" => "Press back again to exit"
                ]
              ]
            ],
            [
              "screenID" => "55",
              "ScreenName" => "Auth Service Screen",
              "keyword_data" => [
                [
                  "screenId" => "55",
                  "keyword_id" => "330",
                  "keyword_name" => "theProvidedPhoneNumberIsNotValid",
                  "keyword_value" => "The provided phone number is not valid"
                ],
                [
                  "screenId" => "55",
                  "keyword_id" => "331",
                  "keyword_name" => "phoneVerificationDone",
                  "keyword_value" => "Phone Verification done"
                ],
                [
                  "screenId" => "55",
                  "keyword_id" => "332",
                  "keyword_name" => "invalidPhoneNumber",
                  "keyword_value" => "invalid phone-number"
                ],
                [
                  "screenId" => "55",
                  "keyword_id" => "333",
                  "keyword_name" => "codeSent",
                  "keyword_value" => "code sent"
                ]
              ]
            ]
        ];      

        foreach ($screen_data as $screen) {
            $screen_record = Screen::where('screenID', $screen['screenID'])->first();
 
            if ($screen_record == null) {
                $screen_record = Screen::create([
                    'screenId'   => $screen['screenID'],
                    'screenName' => $screen['ScreenName']
                ]);
            }

            if(isset($screen['keyword_data']) && count($screen['keyword_data']) > 0) {
                foreach ($screen['keyword_data'] as $keyword_data) {
                    $keyword_record = LanguageKeyword::where('keyword_id', $keyword_data['keyword_id'])->first();

                    if ($keyword_record == null) {
                        $keyword_record = LanguageKeyword::create([
                            'screen_id' => $screen_record['screenId'],
                            'keyword_id' => $keyword_data['keyword_id'],
                            'keyword_name' => $keyword_data['keyword_name'],
                            'keyword_value' => $keyword_data['keyword_value']
                        ]);
                    }
                }
            }
        }
    }  
}