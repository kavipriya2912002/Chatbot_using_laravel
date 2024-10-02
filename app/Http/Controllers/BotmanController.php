<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\BotManFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use BotMan\BotMan\Messages\Incoming\Answer;


class BotmanController extends Controller
{
    public function index()
    {
        Log::alert("Botman request received");
        $botman = app('botman');

        $botman->hears('Hi', function (BotMan $bot) {
            $bot->reply('Hello User! How can I assist you today? type help');
        });
        $botman->hears('help', function (BotMan $bot) {
            $bot->reply('I can help with: "hello", "weather", "info", "joke","quote","time".');
        });

        $botman->hears('weather', function (BotMan $bot) {
            $bot->reply('The weather today is sunny.');
        });

        $botman->hears('info', function (BotMan $bot) {
            $bot->reply('This is a simple chatbot built with Botman.');
        });

        $botman->hears('joke', function (BotMan $bot) {
            $jokes = [
                "Why did the scarecrow win an award? Because he was outstanding in his field!",
                "I told my wife she was drawing her eyebrows too high. She looked surprised!",
                "Why don't skeletons fight each other? They don't have the guts.",
                "Why don’t scientists trust atoms? Because they make up everything!",
                "I told my computer I needed a break, and now it won’t stop sending me KitKat ads!",
                "Why did the bicycle fall over? Because it was two-tired!",
                "What do you call fake spaghetti? An impasta!",
                "Why don’t skeletons fight each other? They don’t have the guts.",
                "What do you call cheese that isn't yours? Nacho cheese!",
                "Why did the scarecrow win an award? Because he was outstanding in his field!",
                "I used to play piano by ear, but now I use my hands.",
                "Why did the math book look sad? Because it had too many problems.",
                "Did you hear about the claustrophobic astronaut? He just needed a little space!",
                "Why was the broom late? It swept in!",
                "What do you call a bear with no teeth? A gummy bear!",
                "I told my wife she was drawing her eyebrows too high. She looked surprised!",
                "How does a penguin build its house? Igloos it together!",
                "Why can’t you give Elsa a balloon? Because she will let it go!",
                "What do you call a factory that makes good products? A satisfactory!",
                "Why did the golfer bring two pairs of pants? In case he got a hole in one!",
                "Why do cows have hooves instead of feet? Because they lactose!",
                "What do you call an alligator in a vest? An investigator!",
                "Why did the computer go to the doctor? Because it had a virus!",
                "I’m reading a book on anti-gravity. It’s impossible to put down!",
                "Why did the coffee file a police report? It got mugged!",
                "Did you hear about the restaurant on the moon? Great food, no atmosphere!",
                "Why did the cookie go to the hospital? Because it felt crummy!",
                "What do you call a snowman with a six-pack? An abdominal snowman!",
                "What do you call a lazy kangaroo? A pouch potato!",
                "Why are elevator jokes so good? They work on many levels.",
            ];
            $randomJoke = $jokes[array_rand($jokes)];
            $bot->reply($randomJoke);
        });

        // Quote command
        $botman->hears('quote', function (BotMan $bot) {
            $quotes = [
                "The only limit to our realization of tomorrow will be our doubts of today. - Franklin D. Roosevelt",
                "Life is 10% what happens to us and 90% how we react to it. - Charles R. Swindoll",
                "Your time is limited, so don’t waste it living someone else’s life. - Steve Jobs",
                "The only way to do great work is to love what you do. - Steve Jobs",
                "Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful. - Albert Schweitzer",
                "Believe you can and you're halfway there. - Theodore Roosevelt",
                "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
                "What lies behind us and what lies before us are tiny matters compared to what lies within us. - Ralph Waldo Emerson",
                "Do not wait to strike till the iron is hot, but make it hot by striking. - William Butler Yeats",
                "You are never too old to set another goal or to dream a new dream. - C.S. Lewis",
                "Your limitation—it's only your imagination.",
                "Push yourself, because no one else is going to do it for you.",
                "Great things never come from comfort zones.",
                "Dream it. Wish it. Do it.",
                "Success doesn’t just find you. You have to go out and get it.",
                "The harder you work for something, the greater you’ll feel when you achieve it.",
                "Dream bigger. Do bigger.",
                "Don’t stop when you’re tired. Stop when you’re done.",
                "Wake up with determination. Go to bed with satisfaction.",
                "It’s not about being the best. It’s about being better than you were yesterday.",
                "The more you believe in yourself, the more you will succeed.",
                "Hard work beats talent when talent doesn’t work hard.",
                "Don’t wait for opportunity. Create it.",
                "Sometimes we’re tested not to show our weaknesses, but to discover our strengths.",
                "The key to success is to focus on goals, not obstacles.",
                "Dream it. Believe it. Build it.",
                "Success usually comes to those who are too busy to be looking for it. - Henry David Thoreau",
                "Opportunities don't happen. You create them. - Chris Grosser",
                "The only place where success comes before work is in the dictionary. - Vidal Sassoon",
                "Don’t be pushed around by the fears in your mind. Be led by the dreams in your heart. - Roy T. Bennett",
                "The road to success and the road to failure are almost exactly the same. - Colin R. Davis",
                "Success is the sum of small efforts, repeated day in and day out. - Robert Collier",
                "Don't watch the clock; do what it does. Keep going. - Sam Levenson",
                "Success is not in what you have, but who you are. - Bo Bennett"
            ];
            $randomQuote = $quotes[array_rand($quotes)];
            $bot->reply($randomQuote);
        });

        // Time command
        $botman->hears('time', function (BotMan $bot) {
            $currentTime = now()->format('H:i:s');
            $bot->reply("The current time is {$currentTime}.");
        });

        $botman->listen();
    }
}
