<?php

namespace Theslowaja\GlobalChat;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\{
    Command,
    CommandSender
};
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onEnable() : void 
    {
        $this->getLogger()->info("Plugin ON!!!!");
    }

    public function onDisable() : void
    {
        $this->getLogger()->info("Plugin OFF!!!!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool 
    {
        switch($command->getName()){
            case "g":
                if($sender->hasPermission("globalchat.command")){
                    if($sender instanceof Player){
                        if(isset($args[0])){
                            $cht = implode(" ", $args);
                            $this->getServer()->broadcastMessage(TextFormat::BOLD."[".TextFormat::GREEN." GlobalChat ".TextFormat::RESET.TextFormat::BOLD."] " . TextFormat::RESET. $sender->getName() ."> ". TextFormat::WHITE. $cht);
                            //$sender->sendMessage(TextFormat::BOLD."[".TextFormat::GREEN." GlobalChat ".TextFormat::RESET.TextFormat::BOLD."] " . TextFormat::RESET. $sender->getName() ."> ". TextFormat::WHITE. $cht);
                        } else {
                            $sender->sendMessage("use /g <message>");
                        }
                    } else {
                        $sender->sendMessage("This command only Player can use!!!");
                    }
                } else {
                        $sender->sendMessage("This command only VIP and higer can use!!!");
                }
        }
    return true;
    }
}