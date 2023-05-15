import 'package:flutter/material.dart';
import 'package:gesty/config/colors.dart';

Widget customLoadingPage({double? size, Color? color}){
  //Se encajona dentro de un SizedBox para poder darle una altura y anchura
  return SizedBox(
    height: size ?? 20,
    width: size ?? 20,
    child: CircularProgressIndicator(
      color: color?? CustomColors.main,
    ),
  );
}