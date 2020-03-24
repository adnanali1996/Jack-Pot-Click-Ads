<?php

use App\General;
use App\User;
use App\MemberExtra;
use App\ChargeCommision;
use App\Transaction;
use Carbon\Carbon;

function send_email($to, $subject, $name, $message)
{
    $general = General::first();
    if ($general->email_nfy == 1) {
        $headers = "From: " . $general->web_title . " <" . $general->esender . "> \r\n";
        $headers .= "Reply-To: " . $general->web_title . " <" . $general->esender . "> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $template = $general->emessage;
        $mm = str_replace("{{name}}", $name, $template);
        $message = str_replace("{{message}}", $message, $mm);
        mail($to, $subject, $message, $headers);
    } else {
        return;
    }
}

if (!function_exists('send_sms')) {
    function send_sms($to, $message)
    {
        $gnl = General::first();
        if ($gnl->sms_nfy == 1) {
            $sendtext = urlencode("$message");
            $appi = $gnl->smsapi;
            $appi = str_replace("{{number}}", $to, $appi);
            $appi = str_replace("{{message}}", $sendtext, $appi);
            $result = file_get_contents($appi);
        }
        return;
    }
}


function updateDepositBV($id = '', $deposit_amount)
{
    $com = ChargeCommision::first();

    while ($id != "" || $id != "0") {
        if (isMemberExists($id)) {
            $posid = getParentId($id);
            if ($posid == "0")
                break;
            $position = getPositionParent($id);
            $currentBV = MemberExtra::where('user_id', $posid)->first();

            if ($position == "L") {
                $new_lbv = $currentBV->left_bv + $deposit_amount;
                $new_rbv = $currentBV->right_bv;
            } else {
                $new_lbv = $currentBV->left_bv;
                $new_rbv = $currentBV->right_bv + $deposit_amount;
            }

            MemberExtra::where('user_id', $posid)
                ->update([
                    'left_bv' => $new_lbv,
                    'right_bv' => $new_rbv,
                ]);


            $user = User::find($posid);
            $new_balance = $user['balance'] =  $user['balance'] + $com['update_commision_tree'];
            Transaction::create([
                'user_id' => $posid,
                'trans_id' => rand(),
                'time' => Carbon::now(),
                'description' => 'TREE BONUS' . '#ID' . '-' . 'BONUS' . rand(),
                'amount' => $com['update_commision_tree'],
                'new_balance' => $new_balance,
                'type' => 1,
            ]);

            $user->save();

            $id = $posid;
        } else {
            break;
        }
    } //while
    return 0;
}



function updatePaid($id)
{
    while ($id != "" || $id != "0") {
        if (isMemberExists($id)) {
            $posid = getParentId($id);
            if ($posid == "0")
                break;
            $position = getPositionParent($id);

            $currentCount = MemberExtra::where('user_id', $posid)->first();

            $new_lpaid = $currentCount->left_paid;
            $new_rpaid = $currentCount->right_paid;
            $new_lfree = $currentCount->left_free;
            $new_rfree = $currentCount->right_free;

            if ($position == "L") {
                $new_lfree = $new_lfree - 1;
                $new_lpaid = $new_lpaid + 1;
            } else {
                $new_rfree = $new_rfree - 1;
                $new_rpaid = $new_rpaid + 1;
            }

            MemberExtra::where('user_id', $posid)
                ->update([
                    'left_paid' => $new_lpaid,
                    'right_paid' => $new_rpaid,
                    'left_free' => $new_lfree,
                    'right_free' => $new_rfree,
                ]);
            $id = $posid;
        } else {
            break;
        }
    }
    return 0;
}






function treeeee($id = '', $uid = '')
{
    while ($id != "" || $id != "0") {
        if (isMemberExists($id)) {
            $posid = getParentId($id);
            if ($posid == "0")
                break;
            if ($posid == $uid) {
                return true;
            }
            $id = $posid;
        } else {
            break;
        }
    } //while
    return 0;
}

function printBV($id)
{
    $cbv = MemberExtra::where('user_id', $id)->first();
    $rid = User::whereId($id)->first();
    $rnm = User::where('id', $rid->referrer_id)->first();
    if ($rnm) {
        echo "<b>Referred By:</b> $rnm->username <br>";
    }

    echo "<b>Current BV:</b> L-$cbv->left_bv | R-$cbv->right_bv <br>";
}

function printBelowMember($id)
{
    $bmbr = MemberExtra::where('user_id', $id)->first();
    echo "<b>Paid Member Below:</b> L-$bmbr->left_paid | R-$bmbr->right_paid <br>";
    echo "<b>Free Member Below:</b> L-$bmbr->left_free | R-$bmbr->right_free <br>";
}

function updateMemberBelow($id, $type = '')
{
    while ($id != "" || $id != "0") {
        if (isMemberExists($id)) {
            echo $posid = getParentId($id);
            if ($posid == "0")
                break;
            echo  $position = getPositionParent($id);
            echo  $currentCount = MemberExtra::where('user_id', $id)->first();
            // exit();
            $new_lpaid = $currentCount->left_paid;
            $new_rpaid = $currentCount->right_paid;
            $new_lfree = $currentCount->left_free;
            $new_rfree = $currentCount->right_free;

            if ($position == "L") {
                if ($type == 'FREE') {
                    $new_lfree = $new_lfree + 1;
                } else {
                    $new_lpaid = $new_lpaid + 1;
                }
            } else {
                if ($type == 'FREE') {
                    $new_rfree = $new_rfree + 1;
                } else {
                    $new_rpaid = $new_rpaid + 1;
                }
            }
            MemberExtra::where('user_id', $posid)
                ->update([
                    'left_paid' => $new_lpaid,
                    'right_paid' => $new_rpaid,
                    'left_free' => $new_lfree,
                    'right_free' => $new_rfree,
                ]);
            $id = $posid;
        } else {
            break;
        }
    }
    return 0;
}

function getParentId($id = "")
{
    $count = User::whereId($id)->count();
    $posid = User::whereId($id)->first();
    if ($count == 1) {
        return $posid->posid;
    } else {
        return 0;
    }
}


function getPositionParent($id)
{
    $count = User::whereId($id)->count();
    $position = User::whereId($id)->first();
    if ($count == 1) {
        return $position->position;
    } else {
        return 0;
    }
}


function getLastChildOfLR($parentid = "", $position = '')
{
    $childid = getTreeChildId($parentid, $position);
    if ($childid != "-1") {
        $id = $childid;
    } else {
        $id = $parentid;
    }
    while ($id != "" || $id != "0") {
        if (isMemberExists($id)) {
            $nextchildid = getTreeChildId($id, $position);
            if ($nextchildid == "-1") {
                break;
            } else {
                $id = $nextchildid;
            }
        } else break;
    }
    return $id;
}
function getTreeChildId($parentid = "", $position = "")
{
    $cou = User::where('posid', $parentid)->where('position', $position)->count();
    $cid = User::where('posid', $parentid)->where('position', $position)->first();
    if ($cou == 1) {
        return $cid->id;
    } else {
        return -1;
    }
}

function isMemberExists($id = '0')
{
    $count = User::where('id', $id)->count();
    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}

function Short_Text($data, $length)
{
    $first_part = explode(" ", $data);
    $main_part = strip_tags(implode(' ', array_splice($first_part, 0, $length)));
    return $main_part . "....";
}

function ImageCheck($ext)
{
    if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif' && $ext != 'bnp') {
        $ext = "";
    }
    return $ext;
}

function NewFile($name, $data)
{
    $fh = fopen($name, "w");
    fwrite($fh, $data);
    fclose($fh);
}

function ViewFile($name)
{
    $fh = fopen($name, "r");
    $data = fread($fh, filesize($name));
    fclose($fh);
    return $data;
}

function Find_fist_int($string)
{
    preg_match_all('!\d+!', $string, $matches);
    if ($matches[0] != "") {
        foreach ($matches[0] as $key => $value) {
            $url = $value;
            return $url;
            break;
        }
    }
}

function Replace($data)
{
    $data = str_replace("'", "", $data);
    $data = str_replace("!", "", $data);
    $data = str_replace("@", "", $data);
    $data = str_replace("#", "", $data);
    $data = str_replace("$", "", $data);
    $data = str_replace("%", "", $data);
    $data = str_replace("^", "", $data);
    $data = str_replace("&", "", $data);
    $data = str_replace("*", "", $data);
    $data = str_replace("(", "", $data);
    $data = str_replace(")", "", $data);
    $data = str_replace("+", "", $data);
    $data = str_replace("=", "", $data);
    $data = str_replace(",", "", $data);
    $data = str_replace(":", "", $data);
    $data = str_replace(";", "", $data);
    $data = str_replace("|", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace('"', "", $data);
    $data = str_replace("?", "", $data);
    $data = str_replace("  ", "_", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace(".", "-", $data);
    $data = strtolower(str_replace("  ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace("__", "-", $data));
    return str_replace("_", "-", $data);
}