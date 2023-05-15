import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'routes/routes.dart';

void main() => runApp(
    GetMaterialApp(
      debugShowCheckedModeBanner: false,
      getPages: appRoutes(),
      initialRoute: '/'
    )
);