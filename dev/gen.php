#!/usr/bin/php
<?php

function print_mysql($count,$name,$description,$type,$time,$delta_com,$delta_cbq,$chance){
  echo "($count, '$name', '$description', '$type', $time, $delta_com, $delta_cbq, $chance),\n";
  if(strlen($name) > 64){
    die("NAME LENGTH ERROR\n");
  }
}

$count = 0;

// Custom issues
$count++;
print_mysql($count,"Code Rebase","Rewrite major parts of the core and update to newest specifications.", 'enhancement', 120, 0, -1, 100);
$count++;
print_mysql($count,'Code Refactor', 'Refactor a segment of the code.', 'enhancement', 60, 0, 4, 100);
$count++;
print_mysql($count,'Color Change', '<pre>git rm -rf *\r\ngit commit -m "Fixed all bugs"\r\ngit push</pre>', 'pull_request', 2, -10, -1000, 1);

$difficulty = array(
  "Simple" => "I have a drag and drop GUI application for this.",
  "Beginner" => "I can\'t believe this is actually an issue.",
  "Casual" => "I might as well drink while I do this. Vodka sounds good.",
  "Greenhorn" => "Maybe I can play starcraft with one hand while I do this.",
  "Novice" => "Do I even need my keyboard to fix this?",
  "Very Easy" => "While I\'m doing this, I guess I\'ll learn DVORAK.",
  "Rookie" => "Wow, this is really easy to fix. Even a VB coder could fix this.",
  "Amateur" => "Ok, drag and drop won\'t fix this.",
  "Apprentice" => "Did someone say Excel macro?",
  "Easy" => "I guess I\'ll download 300MB of IDE to fix this.",
  "Normal" => "This is a issue befitting of me.",
  "Regular" => "There\'s only 2,000 lines of code to sift through.",
  "Adept" => "This language doesn\'t have OOP. How do I make that happen?",
  "Medium" => "The last guy got fired over this code.",
  "Hard" => "Better get a new pot of coffee brewing.",
  "Very Hard" => "Naming conventions? Badges? We don\'t need no stinkin\' naming conventions!",
  "Challenging" => "I might as well beat Contra while I\'m at it.",
  "Tough" => "Why do I need to alter the C compiler to do this?",
  "Masochistic" => "If I write an entire IDE for this, I bet I could do it.",
  "Obscene" => "Why were the backups stored in `/dev/null` ?",
  "Suicidal" => "If I can\'t code this in one go, I\'m starting over.",
  "Crippling" => "It\'s a shame I don\'t know what language this is written in. I can tell it\'s RTL.",
  "Extra Spicy" => "If I drink an entire bottle of Rooster Sauce, I bet I could do this.",
  "Cracker" => "I suppose I could write a back door...",
  "Veteran" => "I will have to get my BAC between 0.129 and 0.138 percent to finish this.",
  "Severe" => "These FPS should not be single digit.",
  "Critical" => "I wonder how much longer I can leave this issue before it blows up.",
  "Elite" => "I may need to leave my feet on the keyboard for a while.",
  "Professional" => "This needs to be done in microseconds, not seconds.",
  "Hardened" => "Can someone CC linus in on this issue?",
  "Ultra-Violence" => "Welly, welly, welly, welly, welly, welly, well. To what do I owe the extreme pleasure of this surprising visit?",
  "Insane" => "I could do this if I can prove Brainfuck to be turing complete.",
  "Impossible" => "What is the fastest algorithm for multiplication of two n-digit numbers?",
  "Heroic" => "The only way to make this work is to use an FPGA and write the code in VHDL.",
  "Legendary" => "Whoever did this originally wrote it in Malbolge.",
  "Mythic" => "I need to find a COBOL programmer if I\'m going to fix this.",
  "Godlike" => "This entire thing needs to be rewritten in assembly.",
);

//echo count($difficulty) . " difficulties.\n";

$bug_types = array(
  "Syntax Error" => "If you\'re happy and you know it, syntax error!",
  "Compilation Error" => "Typos can be a nusiance.",
  "Run Time Error" => "Ouch! My program didn\'t like that!",
  "Logic Error" => "Why isn\'t this section doing what it\'s supposed to be doing?",
  "Latent Error" => "I was not expecting this result.",
  "Division by Zero Error" => "What do you mean you can\'t divide by zero?",
  "Overflow Bug" => "1 + 1 = 0.",
  "Precision Error" => "0.9999999999 != 1.",
  "Infinite Loop" => "Why won\'t this program terminate?",
  "Recursion Error" => "Recursion: See Recursion.",
  "Off By One Error" => "Leave it to a computer to be unable to count.",
  "Null Pointer Error" => "This pointer is not pointing to anything. It should be, but it isn\'t. Why isn\'t it?",
  "Uninitialized Variable Error" => "What the hell is `i_like_to_move_it_move_it`, and why isn\'t it defined?",
  "Type Error" => "What do you mean I can\'t divide strings by a number?",
  "Segfault" => "Who the hell is trying to push the binary into kernel space?",
  "Memory Leak" => "Memory is not a black hole.",
  "Buffer Overflow" => "You shall not pass!",
  "Stack Overflow" => "Pushing but not popping.",
  "Deadlock" => "Why do mute philosophers need to eat with two forks anyway?",
  "Race Condition" => "Remove seatbelt, then leave the car.",
  "Incorrect API usage" => "api.exceptIncomingTransmission()",
  "Incorrect Protocol Implementation" => "Do I *need* HTML to make XML?",
  "Incorrect Hardware Handling" => "Why does this function play the imperial march on my floppy drive?",
  "Performance Issue" => "This process may take anywhere from 0.01 to 9000 seconds.",
  "Random Disk Access Issue" => "Why does this library use twelve thousand individual files?",
  "Unpropagated Updates" => "Why subtract when you can just add a negative number?",
  "Comments Illegible" => "//Has anyone really been far even as decided to use even go want to do look more like?",
  "Documentation Issue" => "Moths do not belong in the relay.",
  "Hard Coded" => "This needs to be dynamic.",
);

//echo count($bug_types) . " bug types.\n";

$enhancement_types = array(
  "Business Request" => "Quite a few companies would love to see this happen.",
  "Personal Request" => "Not many people will benefit from this, but it is rather good idea.",
  "API" => "If we can build an API, we can allow folks to connect to it.",
  "User Interface" => "People like to click buttons. Let\'s add those!",
  "Command Line Interface" => "Let\'s make our system script-able!",
  "Daemon" => "Our system needs to run all the time!",
  "Database" => "Our information needs to be persistent.",
  "Threading" => "Our system needs to take advantage of multi-core processors.",
  "Documentation" => "RTFM? WABFM.",
  "Hardware Integration" => "We need to add a dongle.",
  "Automated Tests" => "I\'m tired of testing.",
  "Makefile" => "When you have eight cores, it\'s nice to have the `-j` flag.",
  "Deploy Scripts" => "We need to have a public instance.",
  "Backup Scripts" => "Keeping stuff stored in /dev/null isn\'t going to work anymore.",
  "Internal Logic" => "Logic will get you from A to B. Imagination will take you everywhere.",
  "Third Party Library" => "Why reinvent the wheel?",
  "Website" => "We need a design that POPS! Maybe even comic sans!",
  "Mailing List" => "You know ... To send emails to and stuff.",
  "Forums" => "Calling all trolls.",
  "IRC Channel" => "Old enough to keep the technically challenged out.",
  "Phone App" => "I need to access this from my phone. Now.",
);

//echo count($enhancement_types) . " enhancement types.\n";

$pull_request_types = array(
  "Patch" => "Someone attached a patch on the issue tracker!",
  "Feature" => "Someone wrote some code and posted it!",
  "Bugfix" => "Someone figured out the problem to a bug and shows how to fix it!",
  "Performance Boost" => "Someone was able to make your system faster!",
);

//echo count($pull_request_types) . " pull request types.\n";

$difficulty_val = 0;
foreach($difficulty as $dkey => $dvalue){
  $difficulty_val++;
  $bug_val = 0;
  foreach($bug_types as $bkey => $bvalue){
    $bug_val++;
    $count++;
    $time = 10*$difficulty_val*($bug_val%10+1);
    $delta_com = floor(pow($time,1.05)/10);
    $delta_cbq = 2;
    $chance = 1+floor((count($difficulty) - $difficulty_val)/10);
    print_mysql($count,"$dkey $bkey","$bvalue $dvalue",'bug',$time,$delta_com,$delta_cbq,$chance);
  }
  $enhancement_val = 0;
  foreach($enhancement_types as $ekey => $evalue){
    $enhancement_val++;
    $count++;
    $time = 10*$difficulty_val*($enhancement_val%10+1);
    $delta_com = floor(pow($time,1.5));
    $delta_cbq = -2;
    $chance = 1+floor((count($difficulty) - $difficulty_val)/10);
    print_mysql($count,"$dkey $ekey","$evalue $dvalue",'enhancement',$time,$delta_com,$delta_cbq,$chance);
  }
  $pull_request_val = 0;
  foreach($pull_request_types as $pkey => $pvalue){
    $pull_request_val++;
    $count++;
    $time = 10;
    $delta_com = pow($difficulty_val*$pull_request_val,2);
    $delta_cbq = -10;
    $chance = 1;
    print_mysql($count,"$dkey $pkey","$pvalue $dvalue",'pull_request',$time,$delta_com,$delta_cbq,$chance);
  }
}
