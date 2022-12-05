<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<h1 style="text-align: center">Testing Task "Delivery"</h1>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Install
- [x] git clone git@github.com:seriklav/api_delivery.git
- [x] cd api_delivery
- [x] docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v $(pwd):/var/www/html \
  -w /var/www/html \
  laravelsail/php81-composer:latest \
  composer install --ignore-platform-reqs
- [x] **sail bash cp .env.example .env**
- [x] sail artisan migrate


## Tasks
- [x] Список всех Delivery со стоимостью доставки (должна быть реализована простейшая фильтрация - по транспортной компании, по весу, по стоимости доставки, по описанию);
- [x] Создание нового Delivery;
- [x] Редактирование Delivery (При редактировании можно менять все параметры, в том числе и транспортную компанию);
- [x] Реализовать базовые feature тесты для всех endpoint'ов;
- [x] Написать родной Laravel Factory который создаст 10 рандомных посылок;
- [x] Написать команду Laravel которая в консоли отобразит эти 10 посылок и стоимость доставки.
- [x] *Можно использовать любые сторонние пакеты которые считаете могут понадобиться.*
- [x] *При разработке нужно учесть, что количество перевозчиков со временем будет увеличиваться.*
- [x] *Алгоритмы расчёта стоимости доставки для операторов могут со временем меняться. Продумать переходный момент с одного алгоритма, на новый.*



## Description
- Необходимо создать новый проект на Laravel и реализовать работу с перевозчиками “Delivery” на предмет получения стоимости доставки по каждому из указанных перевозчиков, согласно представленным формулам. 
- У Delivery есть три свойства - транспортная компания, вес, цена, описание. 
- Компания работает с двумя перевозчиками: 
- 1. USP
- 2. DHL 
- У каждого перевозчика своя формула расчета стоимости доставки посылки 
- **USP** до 4,5 кг берет 2,00 USD, все что выше 4,5 кг берет 3,00 USD 
- **DHL** за каждый 100 грамм берет 0,33 EUR, вес посылки округляется вверх до ближайших 100 грамм. 
- Для сравнения стоимости курс евро жестко фиксируем: 1,00 EUR = 0,97 USD. 
- Необходимо создать простое API, для ресурса Delivery на 3 endpoint'a


# URL's
- [x] POSTMAMN: https://documenter.getpostman.com/view/4732592/2s8YzMZkmL
- [x] HEROKU: https://yellow-media-lumen.herokuapp.com/api/documentation