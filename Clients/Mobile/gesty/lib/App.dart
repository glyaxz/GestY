import 'package:flutter/material.dart';
import 'package:gesty/controllers/CompanyProvider.dart';
import 'package:gesty/models/Company.dart';
import 'package:gesty/resources/custom_loading_page.dart';
import 'package:provider/provider.dart';

/// Deprecated for using GetX instead Flutter Providers & Consumers
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
      builder: (_, controller, child) {
        if (controller.loading) {
          return SizedBox(
            height: screenSize.height,
            width: screenSize.width,
            child: Center(
                child: customLoadingPage()
            )
          );
        } else {
          return buildCompaniesList();
        }
      }
    );
  }

  Widget buildCompaniesList() {
    return SizedBox(
      width: screenSize.width,
      height: screenSize.height * 0.8,
      child: Center(
        child: ListView.builder(
          itemCount: controller.companies.length,
          scrollDirection: Axis.vertical,
          padding: const EdgeInsets.only(bottom: 10),
          itemBuilder: (context, index) => buildCompanyCard(controller.companies[index]),
        ),
      ),
    );
  }

  Widget buildCompanyCard(Company company) {
    // return Text(company.companyName!);
    return Text(company.companyName!);
  }
}
