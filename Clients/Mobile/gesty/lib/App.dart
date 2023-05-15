import 'package:flutter/material.dart';
import 'package:gesty/pages/CompanyList.dart';
import 'package:gesty/src/controllers/CompanyProvider.dart';
import 'package:gesty/src/models/Company.dart';
import 'package:provider/provider.dart';

class App extends StatefulWidget {
  const App({Key? key}) : super(key: key);

  @override
  State<App> createState() => _AppState();
}

class _AppState extends State<App> {
  late Size screenSize;
  late CompanyProvider controller;

  @override
  Widget build(BuildContext context) {
    screenSize = MediaQuery.of(context).size;
    controller = context.read<CompanyProvider>();

    return Scaffold(
      appBar: AppBar(
        title: Text('GestY Admin Pane'),
      ),
      body: buildMainPage()
    );
  }

  Widget buildMainPage() {
    return Consumer<CompanyProvider>(
      builder: (),
    )
}
