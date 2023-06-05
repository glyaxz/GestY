import 'package:gesty/pages/ProjectPage.dart';
import 'package:gesty/pages/TaskPage.dart';
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
      //-----------------------projects-----------------------
      GetPage(
        name: '/projects',
        page: () => const ProjectPage(),
        transition: Transition.leftToRightWithFade,
        transitionDuration: const Duration(milliseconds: 500),
      ),
      //-----------------------Tasks-----------------------
      GetPage(
        name: '/tasks',
        page: () => const TaskPage(),
        transition: Transition.leftToRightWithFade,
        transitionDuration: const Duration(milliseconds: 500),
      ),
    ];
