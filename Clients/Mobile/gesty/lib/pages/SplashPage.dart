import 'package:flutter/material.dart';
import 'package:gesty/controllers/CompanyProvider.dart';
import 'package:gesty/controllers/ProjectProvider.dart';
import 'package:gesty/controllers/TaskProvider.dart';
import 'package:gesty/resources/custom_loading_page.dart';
import 'package:get/get.dart';

class SplashPage extends StatefulWidget {
  const SplashPage({Key? key}) : super(key: key);

  @override
  State<SplashPage> createState() => _SplashPageState();
}

class _SplashPageState extends State<SplashPage> {
  void init() {
    Get.put(CompanyProvider()); // ==> Inicializa el Provider
    // Get.put(ProjectProvider()); // ==> Inicializa el Provider
    // Get.put(TaskProvider()); // ==> Inicializa el Provider
    goToHome();
  }

  /// Espera 2 segundos y redirige a la pantalla principal
  void goToHome() {
    Future.delayed(const Duration(seconds: 2))
        .then((value) => Get.toNamed('/home'));
  }

  @override
  void initState() {
    init();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(child: customLoadingPage()),
    );
  }
}
