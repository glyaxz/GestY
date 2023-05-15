import 'package:get/get.dart';
import 'routes_export.dart';

appRoutes() => [
  //-----------------------Home-----------------------
  GetPage(
    name: '/',
    page: () => const SplashPage(),
    transition: Transition.leftToRightWithFade,
    transitionDuration: const Duration(milliseconds: 500),
  ),
  //-----------------------Home-----------------------
  GetPage(
    name: '/home',
    page: () => const CompanyPage(),
    transition: Transition.leftToRightWithFade,
    transitionDuration: const Duration(milliseconds: 500),
  ),
];
