<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Animation</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(135deg, transparent 0%, transparent 17%,rgba(87, 146, 234,0.6) 17%, rgba(87, 146, 234,0.6) 59%,transparent 59%, transparent 64%,rgba(34, 81, 222,0.6) 64%, rgba(34, 81, 222,0.6) 100%),linear-gradient(45deg, transparent 0%, transparent 2%,rgb(87, 146, 234) 2%, rgb(87, 146, 234) 46%,rgb(114, 178, 239) 46%, rgb(114, 178, 239) 54%,transparent 54%, transparent 63%,rgb(7, 48, 216) 63%, rgb(7, 48, 216) 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255));
        }
        .spark {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            pointer-events: none;
            background-image: repeating-linear-gradient(45deg, hsla(64,83%,54%,0.05) 0px, hsla(64,83%,54%,0.05) 1px,transparent 1px, transparent 11px,hsla(64,83%,54%,0.05) 11px, hsla(64,83%,54%,0.05) 12px,transparent 12px, transparent 32px),repeating-linear-gradient(90deg, hsla(64,83%,54%,0.05) 0px, hsla(64,83%,54%,0.05) 1px,transparent 1px, transparent 11px,hsla(64,83%,54%,0.05) 11px, hsla(64,83%,54%,0.05) 12px,transparent 12px, transparent 32px),repeating-linear-gradient(0deg, hsla(64,83%,54%,0.05) 0px, hsla(64,83%,54%,0.05) 1px,transparent 1px, transparent 11px,hsla(64,83%,54%,0.05) 11px, hsla(64,83%,54%,0.05) 12px,transparent 12px, transparent 32px),repeating-linear-gradient(135deg, hsla(64,83%,54%,0.05) 0px, hsla(64,83%,54%,0.05) 1px,transparent 1px, transparent 11px,hsla(64,83%,54%,0.05) 11px, hsla(64,83%,54%,0.05) 12px,transparent 12px, transparent 32px),linear-gradient(90deg, rgb(41, 27, 158),rgb(249, 77, 212));
            z-index: 1;
            animation: animate 2s linear forwards;
        }

        @keyframes animate {
            0% {
                opacity: 1;
                transform: translate(0, 0);
            }
            100% {
                opacity: 0;
                transform: translate(var(--x), var(--y));
            }
        }
    </style>
</head>
<body>
    <button type="button" name="magic" id="magic" class="btn btn-primary">Magic</button>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const magicButton = document.getElementById('magic');
            
            magicButton.addEventListener("click", () => {
                for (let i = 0; i < 150; i++) {
                    let spark = document.createElement('i');
                    spark.classList.add('spark');
                    let randomSize = Math.random() * 8 + 2;
                    spark.style.width = randomSize + 'px';
                    spark.style.height = randomSize + 'px';

                    const randomX = (Math.random() - 0.5) * window.innerWidth;
                    const randomY = (Math.random() - 0.5) * window.innerHeight;
                    spark.style.setProperty('--x', randomX + 'px');
                    spark.style.setProperty('--y', randomY + 'px');
                    document.body.appendChild(spark);

                    setTimeout(() => {
                        spark.remove();
                    }, 2000);
                }
            });
        });
    </script>
</body>
</html>
