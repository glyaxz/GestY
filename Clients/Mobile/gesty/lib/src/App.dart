import 'package:flutter/material.dart';
import 'package:gesty/pages/CompanyList.dart';

class App extends StatefulWidget {
  const App({Key? key}) : super(key: key);

  @override
  State<App> createState() => _AppState();
}

class _AppState extends State<App> {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: ThemeData.dark(useMaterial3: true),
      home: Scaffold(
        appBar: AppBar(title: Text('Gesty')),
        body: CompanyList(),
        floatingActionButton: FloatingActionButton(
            onPressed: () {  },
            child: Icon(Icons.add),
        ),
      ),
    );
  }
}
