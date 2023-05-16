import 'package:flutter/material.dart';
import 'package:gesty/controllers/CompanyProvider.dart';
import 'package:gesty/models/Company.dart';
import 'package:gesty/resources/custom_loading_page.dart';
import 'package:get/get.dart';

class CompanyPage extends StatefulWidget {
  const CompanyPage({Key? key}) : super(key: key);

  @override
  State<CompanyPage> createState() => _CompanyPageState();
}

class _CompanyPageState extends State<CompanyPage> {
  late Size screenSize;
  CompanyProvider controller = Get.find<CompanyProvider>();

  @override
  Widget build(BuildContext context) {
    screenSize = MediaQuery.of(context).size;

    return Scaffold(
      appBar: AppBar(title: const Text('Empresas')),
      body: buildCompanyPage(),
    );
  }

  Widget buildCompanyPage() {
    return GetBuilder<CompanyProvider>(
      init: CompanyProvider(),
      builder: (controller) {
        if (controller.loading) {
          return SizedBox(
            height: screenSize.height,
            width: screenSize.width,
            child: Center(
              child: customLoadingPage(),
            ),
          );
        } else {
          return buildCompanyList();
        }
      },
    );
  }

  Widget buildCompanyList() {
    return SizedBox(
      height: screenSize.height,
      width: screenSize.width,
      child: Center(
        child: ListView.builder(
          itemCount: controller.companies.length,
          scrollDirection: Axis.vertical,
          padding: const EdgeInsets.only(bottom: 10),
          itemBuilder: (context, index) =>
              buildCompanyCard(controller.companies[index]),
        ),
      ),
    );
  }

  Widget buildCompanyCard(Company company) {
    return Text(company.companyName!);
  }
}
